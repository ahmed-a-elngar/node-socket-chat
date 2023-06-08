$(function () {
    let ip_address = "127.0.0.1";
    let port = 3000;
    let socket = io(ip_address + ":" + port, {
        clientId: "12345",
    });

    socket.on("connect", () => {
        console.log("client connected: " + socket.id);
        // console.log("client connected: " + socket.clientId);
    });

    // send private message

    // socket.emit("send-message", message, (status) => {
    //     console.log({ status });
    // });

    // general receive message
    socket.on("receive-message", (message) => {
        console.log("received: " + message);
    });


    // fire join room
    // socket.emit("join-room", 123);

    // send message to room
    // socket.emit("send-message", "hello to private message", 123);


    // listen on send message command
    $("#messenger_form_submit").on("click", function () {
        sendMessage();
    });

    $("#text_message").on("keypress", function (e) {
        if (e.which == 13) {
            sendMessage();
            e.preventDefault();
        }
    });
    

    function sendMessage() {
        
        let message_content =
            $("#text_message").val().length > 0
                ? $("#text_message").val()
                : null;

        if(message_content)
        {
            saveMessage(message_content);
    
            let user_picture_path =
                "http://127.0.0.1:8000/imgs/faces-clipart/pic-2.png";
            let message =
                '<div class="row mt-1">' +
                '<div class="col-12">' +
                '<img src="' +
                user_picture_path +
                '" class="mt-1 ml-1 float-right" alt="sender picture">' +
                '<p class="message sender">' +
                message_content +
                "</p>" +
                "</div>" +
                "</div>";
            $("#messanger_body").append(message);
            $("#text_message").val("");
        }

    }
    
    function receiveMessage(message_content) {
        let user_picture_path =
            "http://127.0.0.1:8000/imgs/faces-clipart/pic-3.png";
        let message =
            '<div class="row mt-1">' +
            '<div class="col-12">' +
            '<img src="' +
            user_picture_path +
            '" class="mt-1 mr-1 float-left" alt="receiver picture">' +
            '<p class="message receiver">' +
            message_content +
            "</p>" +
            "</div>" +
            "</div>";
        $("#messanger_body").append(message);
        $("#text_message").val("");
    }
    
    function saveMessage(message_content) {
            
        let data = {
            "message": message_content
        };
    
        let result = $.ajax({
            type: "POST",
            url: "http://localhost:8000/api/messages/store",
            dataType: "json",
            headers: {
                Authorization: "Bearer " + "1|pV5fnucKN0h47K8PiYAXCLL5cvsbjkZkdUybfvUp",
            },
            'async': false,
            data: data
        });

        if(result.status == 200)
        {
            socket.emit("send-message", data.message, (status) => {
                //displayStatus(status);
                console.log({ status });
            });
        }
        // console.log("status: " + result.result.status);
    }
});
