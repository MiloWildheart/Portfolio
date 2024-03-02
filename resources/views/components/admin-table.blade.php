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
            flex-basis: 16%;
        }
        .col-2 {
            flex-basis: 16%;
        }
        .col-3 {
            flex-basis: 16%;
        }
        .col-4 {
            flex-basis: 16%;
        }
    }
        .col-5 {
            flex-basis: 16%;
        }
    }
        .col-6 {
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
                    text-align: right;
                }
            }
        }
    }
</Style>
@props(['data', 'dataSource'])

<div class="container">
    <ul class="responsive-table">
        <li class="table-header">
            <!-- Dynamic table headers based on data source -->
            <div class="col col-1">Name</div>
            <div class="col col-2">
                @if ($dataSource === 'tags')
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
                    @if ($dataSource === 'tags')
                        {{ $item->color }}
                    @elseif ($dataSource === 'portfolioItems')
                        {{ Str::limit($item->description, 10) }}
                    @endif
                </div>
                @if ($dataSource === 'portfolioItems')
                    <div class="col col-3" data-label="Image">&#10003;</div>
                    <div class="col col-4" data-label="Link">{{ $item->link }}</div>
                @endif
                <div class="col col-5"><a href="{{ route($dataSource . '.edit', $item->id) }}">Edit</a></div>
                <div class="col col-6">
                    <form action="{{ route($dataSource . '.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <!-- Handle empty data -->
        @endforelse
    </ul>
</div>


