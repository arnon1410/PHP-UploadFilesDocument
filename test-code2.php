<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Checkbox with Larger Text 'NA' and Black Font</title>
    <style>
        /* Hide default checkbox */
        .notapp-checkbox {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 20px;
            height: 20px;
            border: 1px solid #ccc; /* Add border for default state */
            cursor: pointer;
            position: relative;
            margin-right: 5px; /* Adjust spacing as needed */
        }
        /* Checked state */
        .notapp-checkbox:checked {
            border: none; /* Remove border when checked */
        }
        .notapp-checkbox:checked::after {
            content: 'NA'; /* Text symbol for checked state */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black; /* Font color */
            font-size: 18px; /* Larger font size */
            font-family: Arial, sans-serif; /* Optional: Specify font family */
        }
    </style>
</head>
<body>
    <label>
        <input type="checkbox" class="notapp-checkbox">
        Custom Checkbox with Larger Text 'NA' and Black Font
    </label>
</body>
</html>
