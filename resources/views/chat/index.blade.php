@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-4 gap-6 h-[calc(100vh-150px)]">
    <!-- Contacts Panel -->
    <div class="md:col-span-1 bg-slate-800 rounded-xl shadow-lg overflow-hidden flex flex-col">
        <div class="p-4 bg-slate-900 border-b border-slate-700">
            <h2 class="font-bold text-xl text-amber-400">Contacts</h2>
            <div class="relative mt-2">
                <input type="text" placeholder="Search contacts..." class="w-full bg-slate-700 text-slate-200 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400">
                <svg class="absolute right-3 top-2.5 h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        
        <div class="flex-1 overflow-y-auto">
            @foreach($users as $user)
                <a href="{{ route('chat.index', ['user' => $user->id]) }}" class="block p-4 hover:bg-slate-700 transition-colors duration-200 border-b border-slate-700 {{ $selectedUser == $user->id ? 'bg-slate-700' : '' }}">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-slate-600 flex items-center justify-center text-slate-300 font-medium">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">{{ $user->name }}</p>
                            <p class="text-xs text-slate-400 truncate">
                                {{ $user->is_online ? 'Online' : 'Last seen today' }}
                            </p>
                        </div>
                        @if($user->unread_count > 0)
                        <span class="bg-amber-400 text-slate-900 text-xs font-bold px-2 py-0.5 rounded-full">
                            {{ $user->unread_count }}
                        </span>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Chat Panel -->
    <div class="md:col-span-3 flex flex-col bg-slate-800 rounded-xl shadow-lg overflow-hidden h-full">
        @if($selectedUser)
        <div class="p-4 bg-slate-900 border-b border-slate-700 flex items-center">
            @php $currentUser = $users->where('id', $selectedUser)->first(); @endphp
            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-slate-600 flex items-center justify-center text-slate-300 font-medium mr-3">
                {{ substr($currentUser->name, 0, 1) }}
            </div>
            <div>
                <h2 class="font-bold text-white">{{ $currentUser->name }}</h2>
                <p class="text-xs text-slate-400">{{ $currentUser->is_online ? 'Online' : 'Offline' }}</p>
            </div>
        </div>

        <!-- Messages Container -->
        <div class="flex-1 p-4 overflow-y-auto bg-gradient-to-b from-slate-800 to-slate-900">
            <div class="space-y-4">
                @foreach($messages as $msg)
                <div class="flex {{ $msg->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-xs md:max-w-md lg:max-w-lg rounded-lg px-4 py-2 {{ $msg->sender_id == auth()->id() ? 'bg-amber-400 text-slate-900' : 'bg-slate-700 text-white' }}">
                        <div class="text-sm">{{ $msg->message }}</div>
                        <div class="text-right mt-1">
                            <span class="text-xs {{ $msg->sender_id == auth()->id() ? 'text-slate-700' : 'text-slate-400' }}">
                                {{ $msg->created_at->format('H:i') }}
                                @if($msg->sender_id == auth()->id())
                                    <svg class="inline ml-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Message Input -->
        <div class="p-4 bg-slate-900 border-t border-slate-700">
            <form action="{{ route('chat.store') }}" method="POST" class="flex gap-2">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $selectedUser }}">
                <input type="text" name="message" class="flex-1 bg-slate-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400" placeholder="Type your message...">
                <button type="submit" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold px-6 py-3 rounded-lg transition-colors duration-200 flex items-center">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    <span class="ml-1 hidden sm:inline">Send</span>
                </button>
            </form>
        </div>
        @else
        <div class="flex-1 flex items-center justify-center bg-gradient-to-b from-slate-800 to-slate-900">
            <div class="text-center p-6">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-slate-700 mb-4">
                    <svg class="h-6 w-6 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-white mb-1">Select a contact</h3>
                <p class="text-slate-400">Choose a conversation from your contacts to start chatting</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection