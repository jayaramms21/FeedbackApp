<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Course Ratings</title>
</head>
<body>
    <h2>Course Ratings</h2>
    <table border="1">
        <tr>
            <th>Course ID</th>
            <th>Course Rating (%)</th>
        </tr>
        @foreach ($courseRatings as $rating)
            <tr>
                <td>{{ $rating->course_id }}</td>
                <td>{{ $rating->course_rating ?? 'N/A' }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
