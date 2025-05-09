<!DOCTYPE html>
<html>
<head>
    <title>Payslip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .summary {
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payslip for {{ $salary->employee->name }}</h1>
        <h2>{{ $salary->employee->designation->name }}</h2>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount (€)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gross Monthly Salary</td>
                    <td>{{ number_format($salary->gross_salary, 2) }}</td>
                </tr>
                <tr>
                    <td>Gross Annual Salary</td>
                    <td>{{ number_format($salary->gross_salary * 14, 2) }}</td>
                </tr>
                <tr>
                    <td>Net Monthly Salary</td>
                    <td>{{ number_format($salary->breakdown->calculateNetMonthlyIncome(), 2) }}</td>
                </tr>
                <tr>
                    <td>Net Annual Salary</td>
                    <td>{{ number_format($salary->breakdown->calculateNetAnnualIncome(), 2) }}</td>
                </tr>
                <tr>
                    <td>EFKA Contributions</td>
                    <td>{{ number_format($salary->breakdown->calculateEfka(), 2) }}</td>
                </tr>
                <tr>
                    <td>Income Tax</td>
                    <td>{{ number_format($salary->breakdown->calculateIncomeTax(), 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="summary">
            <p><strong>Total Net Annual Salary:</strong> {{ number_format($salary->breakdown->calculateNetAnnualIncome(), 2) }} €</p>
        </div>
    </div>
</body>
</html>