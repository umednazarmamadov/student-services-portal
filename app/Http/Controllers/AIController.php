<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function suggest($id)
    {
        $ticket = Ticket::findOrFail($id);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful university IT support assistant. Analyze the ticket and suggest a solution in 2-3 sentences.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Ticket title: ' . $ticket->title . ' Description: ' . $ticket->description
                ]
            ],
            'max_tokens' => 150
        ]);

        $responseData = $response->json();
        \Log::info(json_encode($responseData));

        if (!isset($responseData['choices'])) {
            return response()->json(['suggestion' => 'Error: ' . json_encode($responseData)]);
        }

        $suggestion = $responseData['choices'][0]['message']['content'];

        return response()->json(['suggestion' => $suggestion]);
    }
}