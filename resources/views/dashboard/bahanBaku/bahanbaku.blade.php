<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolívar Coffee Dashboard - Stock</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    /* CSS untuk Responsif */

    .stock-view {
        margin-top: 20px;
    }

    .search-bar {
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        width: 100%;
    }

    .search-bar .search-icon {
        position: absolute;
        left: 15px;
        font-size: 20px;
        color: #445D48;
        pointer-events: none;
        top: 50%;
        transform: translateY(-50%);
    }

    .search-bar input[type="text"] {
        flex: 1;
        padding: 10px 12px;
        padding-left: 40px;
        border: 1px solid #ccc;
        border-radius: 8px;
        height: 40px;
        font-size: 16px;
    }

    .create-btn {
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
        color: #000000;
        gap: 10px;
        border: none;
        padding: 10px 12px;
        border-radius: 8px;
        cursor: pointer;
        height: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: auto;
        text-align: center;
    }

    .create-text {
        font-size: 15px;
        margin-left: 0px;
    }

    .create-btn .material-symbols-outlined {
        font-size: 20px;
        color: #000000;
    }

    /* Styling tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #c9d6cf;
        border-right: 1px solid #c9d6cf;
    }

    th {
        background-color: #445D48;
        color: #ffffff;
        padding: 20px 12px;
        text-align: center;
        border-bottom: 1px solid #c9d6cf;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .edit-btn,
    .delete-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
        color: #ffffff;
        border: none;
        padding: 10px 12px;
        border-radius: 8px;
        cursor: pointer;
        gap: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-decoration: none;
    }

    .edit-btn .material-symbols-outlined,
    .delete-btn .material-symbols-outlined {
        font-size: 20px;
        margin: 0;
        text-decoration: none;
    }

    .edit-btn:hover {
        background: linear-gradient(135deg, #C3F3DB 0%, #556D58 100%);
    }

    .delete-btn:hover {
        background: linear-gradient(135deg, #C3F3DB 0%, #556D58 100%);
    }

    @media (max-width: 768px) {
        .search-bar {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
            width: 100%;
        }

        .search-input {
            padding: 10px;
            border: 1px solid #c9d6cf;
            border-radius: 8px;
            width: 100%;
            font-size: 16px;
            height: 40px;
            box-sizing: border-box;
            text-align: left;
        }

        .create-btn {
            width: auto;
            flex-shrink: 0;
        }

        table {
            font-size: 14px;
        }

        th,
        td {
            display: block;
            width: 100%;
        }

        th {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
        }

        .edit-btn,
        .delete-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #B0EACD 0%, #445D48 100%);
            color: #ffffff;
            border: none;
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            gap: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }

        td {
            text-align: right;
            padding-left: 50%;
            position: relative;
            padding: 10px;
        }

        td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            width: calc(50% - 20px);
            padding-right: 10px;
            text-align: left;
            font-weight: bold;
        }
    }
</style>

<body>
    @include('layout.sidebar')

    <div class="main-content">
        <header>
            <h1>Bolívar Coffee - Stock List</h1>
            <div class="notification"></div>
        </header>

        <div class="stock-view">
            <div class="search-bar">
                <span class="material-symbols-outlined search-icon">search</span>
                <input type="text" placeholder="Search Stock..." class="search-input">
                <button class="create-btn" onclick="window.location='{{ route('stocks.create') }}'">
                    <span class="create-text">Create Stock</span>
                    <span class="material-symbols-outlined">add</span>
                </button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Stock ID</th>
                        <th>Stock Name</th>
                        <th>Stock Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahanBaku as $BahanBaku)
                        <tr>
                            <td data-label="stock ID">{{ $BahanBaku->id }}</td>
                            <td data-label="stock Name">{{ $BahanBaku->namaBahanBaku }}</td>
                            <td data-label="Stock Quantity">{{ $BahanBaku->jumlahBahanBaku }}</td>
                            <td data-label="Actions">
                                <div class="action-buttons">

                                    <a href="{{ route('stocks.edit', $BahanBaku->id) }}" class="edit-btn">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>

                                    <form action="{{ route('stocks.delete', $BahanBaku->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>