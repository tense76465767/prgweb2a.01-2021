<ul>
    @foreach ($teachers as $teacher)
    <li>
        {{ $teacher->firstName . ' ' . $teacher->lastName }}
    </li>
    @endforeach
</ul>