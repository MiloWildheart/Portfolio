<Style scoped>
    body {
        font-family: 'lato', sans-serif;
    }
    .container {
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 10px;
        padding-right: 10px;
    }

    h2 {
        font-size: 26px;
        margin: 20px 0;
        text-align: center;
        small {
            font-size: 0.5em;
        }
    }

    .responsive-table {
    li {
        border-radius: 3px;
        padding: 25px 30px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .table-header {
        background-color: #95A5A6;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .table-row {
        background-color: #ffffff;
        box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
    }

    .col {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 1; /* Distribute remaining space equally */
    }

    @media all and (max-width: 767px) {
        .table-header {
            display: none;
        }
        .table-row {}

        li {
            display: block;
        }

        .col {
            flex-grow: 1; /* Distribute remaining space equally */
            padding: 10px 0;
        }

        .col:before {
            color: #6C7A89;
            padding-right: 10px;
            content: attr(data-label);
            text-align: center;
        }
    }
}


        .table-header {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    display: flex; /* Ensure it's a flex container */
    justify-content: center; /* Align children to the start and end */
    align-items: center; /* Align items vertically */
    padding: 0 30px; /* Adjust padding as needed */
    
}

.create {
    background-color: #68D391; /* Background color */
    color: #1A202C; /* Text color */
    font-weight: bold; /* Font weight */
    padding: 0.5rem 1rem; /* Padding */
    border-radius: 0.375rem; /* Rounded corners */
    margin-top: 0.5rem; /* Margin - top */
    margin-right: 30px; /* Add margin-right to push it to the right */
}

.create:hover {
    background-color: #48BB78; /* Hover background color */
}
.button {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #F4C430; /* Default background color for buttons */
    border: none;
    cursor: pointer;
}

.button:hover {
    background-color: #EEDC82; /* Hover background color */
}
.Delete .button {
    background-color: #FF2800; /* Set the background color for delete button */
}

.Delete .button:hover {
    background-color: #FF5733; /* Hover background color for delete button */
}

.Edit {
    margin-left: auto;
}

.Delete {
    margin-left: auto;
}
</Style>

@props(['data', 'dataSource'])

<div class="container">
    <!-- Title header -->
    <x-divider>
        @if ($dataSource === 'personal-info')
            Personal Information
        @elseif ($dataSource === 'relevant-knowledge')
            Relevant Knowledge
        @elseif ($dataSource === 'work-experience')
            Work Experiences
        @elseif ($dataSource === 'education')
            Education
        @elseif ($dataSource === 'Tags')
            Tags
        @elseif ($dataSource === 'portfolioItems')
            Portfolio 
        @endif
    </x-divider>

    <!-- Dynamic table -->
    <div class="table-header">
        <a href="{{ route($dataSource . '.create') }}" class="flex create">
            Create New
        </a>
    </div>
    <ul class="responsive-table">
        <li class="table-header">
            <!-- Dynamic table headers based on data source -->
            @if ($dataSource === 'personal-info')
                <div class="col">Name</div>
                <div class="col">Age</div>
                <div class="col">Email</div>
                <div class="col">Residence</div>
                <div class="col">Personal Story</div>
            @elseif ($dataSource === 'relevant-knowledge')
                <div class="col">Name</div>
                <div class="col">Description</div>
                <div class="col">Proficiency</div>
            @elseif ($dataSource === 'work-experience')
                <div class="col">Workplace</div>
                <div class="col">Job Type</div>
                <div class="col">Start Date</div>
                <div class="col">End Date</div>
                <div class="col">Duties</div>
            @elseif ($dataSource === 'education')
                <div class="col">Name</div>
                <div class="col">School</div>
                <div class="col">Start Date</div>
                <div class="col">End Date</div>
            @elseif ($dataSource === 'Tags')
                <div class="col">Name</div>
                <div class="col">Color</div>
            @elseif ($dataSource === 'portfolioItems')
                <div class="col">Name</div>
                <div class="col">description</div>
                <div class="col">Image</div>
                <div class="col">Link</div>
            @endif
            <div class="col">Edit</div>
            <div class="col">Delete</div>
        </li>
        @forelse ($data as $item)
            <li class="table-row">
                <!-- Dynamic row data based on data source -->
                @if ($dataSource === 'personal-info')
                    <div class="col" data-label="Name">{{ $item->name }}</div>
                    <div class="col" data-label="Age">{{ $item->age }}</div>
                    <div class="col" data-label="Email">{{ $item->email }}</div>
                    <div class="col" data-label="Residence">{{ $item->residence }}</div>
                    <div class="col" data-label="Personal Story">{{ Str::limit($item->personal_story, 10) }}</div>
                @elseif ($dataSource === 'relevant-knowledge')
                    <div class="col" data-label="Name">{{ $item->name }}</div>
                    <div class="col" data-label="Description">{{ $item->description }}</div>
                    <div class="col" data-label="Proficiency">{{ $item->proficiency }}</div>
                @elseif ($dataSource === 'work-experience')
                    <div class="col" data-label="Workplace">{{ $item->workplace }}</div>
                    <div class="col" data-label="Job Type">{{ $item->job_type }}</div>
                    <div class="col" data-label="Start Date">{{ $item->start_date }}</div>
                    <div class="col" data-label="End Date">{{ $item->end_date }}</div>
                    <div class="col" data-label="Duties">{{ $item->duties }}</div>
                @elseif ($dataSource === 'education')
                    <div class="col" data-label="Name">{{ $item->name }}</div>
                    <div class="col" data-label="School">{{ $item->school }}</div>
                    <div class="col" data-label="Start Date">{{ $item->start_date }}</div>
                    <div class="col" data-label="End Date">{{ $item->end_date }}</div>
                @elseif ($dataSource === 'Tags')
                    <div class="col" data-label="Name">{{ $item->name }}</div>
                    <div class="col" data-label="Color">{{ $item->color }}</div>
                @elseif ($dataSource === 'portfolioItems')
                    <div class="col" data-label="Name">{{ $item->name }}</div>
                    <div class="col" data-label="description">{{ Str::limit($item->description, 10) }}</div>
                    <div class="col" data-label="Image">&#10003;</div> <!-- hardcoded image here -->
                    <div class="col" data-label="Link"><a href="{{ $item->link }}">{{ $item->link }}</a></div>
                @endif
                <div class="col col-6 Edit">
                    <a href="{{ route($dataSource . '.edit', $item->id) }}" class="button">Edit</a>
                </div>
                <div class="col col-7 Delete">
                    <form action="{{ route($dataSource . '.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="table-row">
                <div class="col col-1">No records found</div>
            </li>
        @endforelse
    </ul>
    <div>
        {{ $data->links() }}
    </div>
</div>