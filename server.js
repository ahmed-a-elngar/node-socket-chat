const fetch = require("node-fetch");
// import io from "./node_modules/socket.io/dist/index"
const io = require("socket.io")(3000, {
    cors: {
        origin: "*",
    },
});

io.on("connection", (socket) => {
    console.log("connection stablished: " + socket.id);
    // console.log(io.engine.clientsCount);

    // listen on sending message
    socket.on("send-message", (message, callback, room) => {
        // save it
        console.log("sent: " + message);

        // fire receiving event
        if (room) {
            socket.to(room).emit("receive-message", message);
        } else {
            socket.broadcast.emit("receive-message", message);
        }

        callback("200");
    });

    // listen to join room
    socket.on("join-room", (room) => {
        socket.join(room);
    });
});

