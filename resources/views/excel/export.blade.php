<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Course</th>
            <th>Region</th>
            <th>Province</th>
            <th>City/Municipality</th>
            <th>District</th>
            <th>ZIP code</th>
            <th>Nationality</th>
            <th>Sex</th>
            <th>Civil Status</th>
            <th>Employment Status</th>
            <th>Birthdate</th>
            <th>Birthplace</th>
            <th>Educational Attainment</th>
            <th>Parent Full name</th>
            <th>Parent Contact Number</th>
            <th>Parent Address</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php
        $x=1;
        @endphp
        @foreach ($students as $student)
            <tr>
                <td>
                    {{$x++}}
                </td>
                <td>
                    {{ucfirst($student->fname)." ".ucfirst($student->lname)}}
                </td>
                <td>
                    {{$student->program->name}}
                </td>
                <td>
                    {{$student->region}}
                </td>
                <td>
                    {{$student->province}}
                </td>
                <td>
                    {{$student->city}}
                </td>
                <td>
                    {{$student->district}}
                </td>
                <td>
                    {{$student->zipcode}}
                </td>
                <td>
                    {{$student->nationality}}
                </td>
                <td>
                    {{$student->gender}}
                </td>
                <td>
                    {{$student->civil_status}}
                </td>
                <td>
                    {{$student->employment}}
                </td>
                <td>
                    {{$student->birthdate}}
                </td>
                <td>
                    {{$student->birthplace}}
                </td>
                <td>
                    {{$student->education}}
                </td>
                <td>
                    {{$student->parent->pfname." ".$student->parent->pmname." ".$student->parent->plname}}
                </td>
                <td>
                    0{{$student->parent->pcontact_number}}
                </td>
                <td>
                    {{$student->parent->pmunicipality}}
                </td>
                <td>
                    0{{$student->contact_number}}
                </td>
                <td>
                    {{strtoupper($student->email)}}
                </td>
                <td>
                    {{$student->created_at->format('M-d-Y')}}
                </td>
                <td>
                    {{$student->status===false?'Pending':'Accepted'}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
