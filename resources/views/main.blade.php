<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guestbook</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>
<body>
<div>
    <div>
        <div class="ml-2">
            {{ $messages->links() }}
        </div>
        <table>
            <tr class="border-solid border border-black text-center w-full">
                <th class="w-1/6"> @sortablelink('username') </th>
                <th class="w-1/6">E-mail</th>
                <th class="w-1/6">URL</th>
                <th class="w-1/6">Message</th>
                <th class="w-1/6">@sortablelink('Time')</th>
            </tr>
            @foreach($messages as $message)
                <tr class="text-center">
                    <td class="border border-solid border-gray-400">{{ $message->username }}</td>
                    <td class="border border-solid border-gray-400">{{ $message->email}}</td>
                    <td class="border border-solid border-gray-400">{{ $message->url }}</td>
                    <td class="border border-solid border-gray-400">{{ $message->message }}</td>
                    <td class="border border-solid border-gray-400">{{ $message->created_at }}</td>
                </tr>
            @endforeach

        </table>
        <div class="ml-2">
            {{ $messages->links() }}
        </div>

    </div>

    <div class="border-t-2 border-solid border-gray-500">

        @if(Session::has('success'))

            <p class="text-green-600 ml-2">{{ Session::get('success') }}</p>

        @endif

            @foreach ($errors->all() as $error)
                <p class="text-red-600 ml-2">{{ $error }}</p>
            @endforeach

        <form action="/" method="post" class="ml-2">
            @csrf
            <div class="grid grid-cols-3 w-1/2 gap-2">
                <div>
                    <label for="username">Username:</label><br>
                    <input type="text" name="username" id="username" class="border-solid border border-gray-400"><br>
                    <label for="email">E-mail:</label><br>
                    <input type="email" name="email" id="email" class="border-solid border border-gray-400"><br>
                    <label for="url">URL:</label><br>
                    <input type="text" name="url" id="url" class="border-solid border border-gray-400"><br>
                </div>
                <div class="w-1/6">
                    <label for="message">Message:</label><br>
                    <textarea name="message" id="message" cols="30" rows="5" style="resize: none;"
                              class="border-solid border border-gray-400"></textarea><br>
                </div>
                <div class="w-1/6 mt-6">
                    <button class="border-solid border-2 border-black bg-green-600 p-1 rounded" type="submit">Submit
                    </button>
                    <br>
                    <div class="mt-2">
                        {!! htmlFormSnippet() !!}
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
