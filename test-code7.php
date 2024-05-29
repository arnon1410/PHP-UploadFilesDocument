<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Single Checkbox Selection and Textarea</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        textarea {
            width: 100%;
            height: 50px;
            display: none; /* Hide textarea initially */
        }
        .hidden-row {
            display: none;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Checkbox 1</th>
            <th>Checkbox 2</th>
            <th>Textarea</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="checkbox" name="row1" onchange="toggleCheckboxes(this)"></td>
            <td><input type="checkbox" name="row1" onchange="toggleCheckboxes(this)"></td>
            <td><textarea></textarea></td>
        </tr>
        <tr class="hidden-row">
            <td colspan="3">This row should be hidden when Checkbox 2 is checked.</td>
        </tr>
    </tbody>
</table>

<script>
    function toggleCheckboxes(checkbox) {
        const checkboxes = document.querySelectorAll(`input[type="checkbox"][name="${checkbox.name}"]`);
        checkboxes.forEach(box => {
            if (box !== checkbox) {
                box.checked = false;
                const textarea = box.parentElement.nextElementSibling.querySelector('textarea');
                textarea.style.display = 'none';
            }
        });

        const textarea = checkbox.parentElement.nextElementSibling.querySelector('textarea');
        textarea.style.display = checkbox.checked ? 'block' : 'none';
    }
</script>

</body>
</html>
