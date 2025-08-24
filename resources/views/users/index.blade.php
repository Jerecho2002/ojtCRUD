<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif
    <h1>Users</h1>
    <table>
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Update User</th>
            <th>Delete User</th>
            <th>Force Delete User</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('updatePageName', ['user' => $user]) }}" method="get">
                        @csrf
                        <button type="submit">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('deleteSubmitName', ['user' => $user]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
         </table>
         <h1>Users Deleted</h1>
         <table>
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Restore User</th>
        </tr>
        @foreach($userTrashed as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('restoreSubmitName', ['user' => $user]) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit">Restore</button>
                </form>
            </td>
            <td>
                    <form action="{{ route('forceDeleteSubmitName', ['user' => $user]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Force Delete</button>
                    </form>
                </td>
        </tr>
        @endforeach
   </table>
   <div>
    <h1>Email Sender</h1>
        @if(session()->has('email-success'))
                <p>{{ session('email-success') }}</p>
            @endif
            <form action="{{ route('sendMailName') }}" method="post">
                @csrf
                <input type="email" name="email" id="" placeholder="Email">
                <input type="text" name="subject" id="" placeholder="Subject">
                <input type="text" name="content" id="" placeholder="Content">
                <button type="submit">Send email</button>
            </form>
   </div>
     <form action="{{ route('logoutSubmitName') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
</body>
</html>