const express = require('express');
const app = express();
const { v4 : uuidv4} = require('uuid');
const port = process.env.port || 6565;
let mySQL = require('mysql');
const { result } = require('lodash');

let connection = mySQL.createConnection({
    host : '127.0.0.1',
    user : 'root',
    password : '',
    database : 'todo_app',
});

const server = app.listen(`${port}`, () => {
    console.log(`Server started on port =>> ${port}`);
    connection.connect();
});


const io = require("socket.io")(server, {
    cors : {origin : "*"}
});

io.on('connection', (socket) => {
    console.log('Client is connected');

    // io.on('order_create', (data) => {
    //     console.log(data);
    // });
    socket.on('order_create', async function(data){
        let orderData = {
            order_code : uuidv4(),
            item_id: data.item_id,
            created_at: mySQL.raw('CURRENT_TIMESTAMP()'),
            updated_at: mySQL.raw('CURRENT_TIMESTAMP()')
        };

        connection.query('INSERT INTO orders SET ?', orderData, (error, results) => {
            if(error) throw error;

            console.log(results);
        });

    });

    socket.on('disconnect', () => {
        console.log('Client disconnected');
    });
});