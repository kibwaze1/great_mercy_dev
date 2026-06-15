@extends('layouts.app')

@section('title', 'Enquire')

@section('content')
    <div class="page-header">
        <h1><i class="fas fa-comment-dots"></i> Chat with Us</h1>
        <p>We're here to answer your questions.</p>
    </div>

    <div class="chat-container">
        <div class="chat-body" id="chatBody">
            <div class="chat-message bot">Hello! How can we help you today? Ask about our school, orphanage, clinic, chapel, or enrollment.</div>
        </div>
        <div class="chat-input-area">
            <input type="text" id="chatInput" placeholder="Type your message..." autocomplete="off">
            <button id="sendChatBtn"><i class="fas fa-paper-plane"></i></button>
        </div>
        <div class="chat-footer">
            <button id="agentBtn" class="agent-btn">📞 Speak to an Agent</button>
        </div>
    </div>
@endsection
