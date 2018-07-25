# Chatter

Streaming Chat Application Built with PHP, ESS, works in restricted shared server! 

This is a toy web application for chattering with people all over the world.

Avaliable on [HERE](https://cretgp.com/lab/chatter) now!

## Architecture

What technology will you use when you want to create a chat app? The Websocket Protocol (bidirectional, asynchronized connection between the server and the client) or WebRTC or the basic client-server-database architecture is the common way to do that. I've tested WebRTC and The Websocket Protocoll and these ways didn't work properly in this server due to the heavy restriction.

The asyncronized connection is one of the important things to do that. I found The EventSource Interface, and it works fine. So I created the test app using asyncronized connections.





