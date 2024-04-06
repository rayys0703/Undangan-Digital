<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/pasangan.css') }}">
    <style>
        /* CSS untuk form sejajar atau bersebelahan */
        .user-details {
            display: flex;
            flex-direction: column;
        }

        .input-box {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            position: relative;
        }

        .edit-icon, .delete-icon {
            cursor: pointer;
            position: absolute;
            right: 10px;
        }

        .edit-icon {
            display: flex;
            margin-right: 35px;
        }

        .input-box input[type="text"] {
            flex: 1;
        }

        .input-box:hover .edit-icon {
            display: inline; /* Menampilkan ikon edit saat dihover */
        }

        .input-box:hover .delete-icon {
            display: inline; /* Menampilkan ikon delete saat dihover */
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="#">
            <div class="content">
                <h2 style="text-align: center; justify-content: center; display: flex; margin-bottom: 5px;">TENTUKAN RANGKAIAN ACARA</h2>
                <h3 style="text-align: center; justify-content: center; display: flex; margin-bottom: 60px; color: gray;">Informasi ini akan sangat membantu tamu</h3>
                <input type="date" placeholder="masukan tanggal" required>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"></span>
                        <input type="text" id="resepsiInput" required>
                        <span class="edit-icon" onclick="editFunction(this)">✎</span>
                        <span class="delete-icon" onclick="deleteFunction(this)">❌</span>
                    </div>

                    <div class="input-box">
                        <span class="details"></span>
                        <input type="text" id="akadinput" required>
                        <span class="edit-icon" onclick="editFunction(this)">✎</span>
                        <span class="delete-icon" onclick="deleteFunction(this)">❌</span>
                    </div>
                    <!-- ... -->
                </div>
                <div class="input-checkbox" style="margin-bottom: 15px;">
                    <!-- ... -->
                </div> 
                <div class="button">
                    <input type="submit" value="Lanjut">
                </div>
            </div>
        </form>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('resepsiInput').value = 'RESEPSI';
            document.getElementById('akadinput').value = 'AKAD';
        });
    </script>
</body>
</html>
