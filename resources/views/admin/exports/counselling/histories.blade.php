<table>
    <tr>
        <th>No</th>
        <th>Counselling ID</th>
        <th>Counsellor</th>
        <th>Counselling Method</th>
        <th>Date and Time</th>
        <th>Session</th>
        <th>Status</th>
        <th>Created At</th>
    </tr>
    @foreach($counsellings as $counselling)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $counselling->counselling_id }}</td>
            <td>{{ $counselling->counsellor['name'] }}</td>
            <td>{{ $counselling->getCounsellingMethod() }}</td>
            <td>{{ $counselling->due->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
            <td>{{ $counselling->getSessionQuantity() }}</td>
            <td>{{ Str::lower($counselling->status) }}</td>
            <td>{{ $counselling->created_at->timezone(auth()->user()->timezone)->format('F j, Y H:i') }}</td>
        </tr>
    @endforeach
</table>
