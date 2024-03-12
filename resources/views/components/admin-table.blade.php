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
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
        }
        .col-1 {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 16%;
        }
        .col-2 {
            display: flex;
            flex-basis: 16%;
            align-items: center;
            justify-content: center;
        }
        .col-3 {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 16%;
        }
        .col-4 {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 16%;
        }
    
        .col-5 {
            display: flex;
            flex-basis: 16%;
            justify-content: center; /* Align content to the start */
            align-items: center;
        }
    
        .col-6 {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-basis: 16%;
        }

        @media all and (max-width: 767px) {
            .table-header {
                display: none;
            }
            .table-row{
                
            }
            li {
                display: block;
            }
            .col {
                
                flex-basis: 100%;
                
            }
            .col {
                display: flex;
                padding: 10px 0;
                &:before {
                    color: #6C7A89;
                    padding-right: 10px;
                    content: attr(data-label);
                    flex-basis: 50%;
                    text-align: center;
                }
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
        @if ($dataSource === 'Tags')
            Tags
        @elseif ($dataSource === 'portfolioItems')
            Portfolio 
        @endif
    </x-divider>

    <!-- dynamic table -->
<div class="table-header">
    <a href="{{ route($dataSource . '.create') }}" class="flex create ">
            create New
    </a>
    </div>
    <ul class="responsive-table">
        <li class="table-header">
            <!-- Dynamic table headers based on data source -->
            <div class="col col-1">Name</div>
            <div class="col col-2">
                @if ($dataSource === 'Tags')
                    Color
                @elseif ($dataSource === 'portfolioItems')
                    Description
                @endif
            </div>
            @if ($dataSource === 'portfolioItems')
                <div class="col col-3">Image</div>
                <div class="col col-4">Link</div>
            @endif
            <div class="col col-5">Edit</div>
            <div class="col col-6">Delete</div>
        </li>
        @forelse ($data as $item)
            <li class="table-row">
                <!-- Dynamic row data based on data source -->
                <div class="col col-1" data-label="Name">{{ $item->name }}</div>
                <div class="col col-2" data-label="Description">
                    @if ($dataSource === 'Tags')
                        {{ $item->color }}
                    @elseif ($dataSource === 'portfolioItems')
                        {{ Str::limit($item->description, 10) }}
                    @endif
                </div>
                @if ($dataSource === 'portfolioItems')
                    <div class="col col-3" data-label="Image">&#10003;</div>
                    <div class="col col-4" data-label="Link">{{ $item->link }}</div>
                @endif
                <div class="col col-5 Edit">
                    <a href="{{ route($dataSource . '.edit', $item->id) }}" class="button">Edit</a>
                </div>
                <div class="col col-6 Delete">
                    <form action="{{ route($dataSource . '.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="button">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <!-- Handle empty data -->
        @endforelse
    </ul>
    <div>
        {{ $data->links() }}
    </div>
</div>


