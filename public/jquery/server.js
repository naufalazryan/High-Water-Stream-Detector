const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const mysql = require('mysql');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

const db = mysql.createConnection({
  host: 'localhost',
  user: 'naufalazryan',
  password: '23042005BJBfy@',
  database: 'project_building'
});

db.connect();

io.on('connection', socket => {
  console.log('A user connected');
  
  socket.on('disconnect', () => {
    console.log('User disconnected');
  });

  // Handle real-time updates
  socket.on('update_task', data => {
    const { id, completed } = data;
    db.query('UPDATE tasks SET completed = ? WHERE id = ?', [completed, id], (error, result) => {
      if (error) {
        console.error('Error updating task:', error);
      } else {
        io.emit('task_updated', data); // Broadcast the update to all connected clients
      }
    });
  });
});

server.listen(3000, () => {
  console.log('Server is running on port 3000');
});
