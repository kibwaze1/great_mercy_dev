<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Great Mercy Fee Structure 2026</title>
    <style>
        @page {
            size: A4;
            margin: 1.2cm;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            background: white;
            font-size: 12pt;
        }

        .page {
            max-width: 100%;
            margin: 0 auto;
            background: white;
        }

        /* Letterhead Styles - Same as admission page */
        .letterhead {
            text-align: center;
            margin-bottom: 15px;
        }

        .school-name {
            font-family: 'Times New Roman', Times, serif;
            font-size: 22pt;
            font-weight: 900;
            color: #000000;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .school-motto {
            font-family: 'Comic Sans MS', 'Comic Sans', cursive;
            font-size: 11pt;
            color: #cc0000;
            margin: 5px 0;
        }

        .letterhead-row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 15px 0;
        }

        .letterhead-left {
            text-align: right;
            padding-right: 15px;
            width: 35%;
        }

        .letterhead-right {
            text-align: left;
            padding-left: 15px;
            width: 35%;
        }

        .letterhead-center {
            text-align: center;
            width: 30%;
        }

        .logo-center {
            height: 60px;
            width: auto;
        }

        .contact-item {
            font-family: 'Times New Roman', Times, serif;
            font-size: 9pt;
            margin-bottom: 3px;
            line-height: 1.3;
        }

        .contact-label {
            font-weight: 600;
            color: #000;
        }

        .contact-value {
            color: #000;
        }

        .email-value {
            color: #6c8ebf;
        }

        .website-value {
            color: #6c8ebf;
        }

        .header-line-thick {
            width: 100%;
            height: 3px;
            background-color: #000;
            margin: 8px 0 4px 0;
        }

        .header-line-thin {
            width: 100%;
            height: 1px;
            background-color: #000;
            margin: 0 0 10px 0;
        }

        /* Title */
        h2 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14pt;
            font-weight: 800;
            text-align: center;
            margin: 15px 0;
        }

        /* Fee Table */
        .fee-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 10pt;
        }

        .fee-table th {
            background: #002D62;
            color: white;
            padding: 8px 10px;
            font-weight: 700;
            text-align: center;
            border: 1px solid #000;
        }

        .fee-table td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: center;
        }

        .fee-table .category {
            font-weight: 700;
            background-color: #f5f5f5;
            text-align: left;
        }

        .fee-table .total {
            font-weight: 700;
            background-color: #eef2f7;
        }

        /* Payment Information */
        .payment-info {
            margin-top: 15px;
            padding: 10px 12px;
            background-color: #f9fafb;
            border-left: 4px solid #002D62;
            font-size: 9pt;
            line-height: 1.4;
        }

        .payment-info p {
            margin-bottom: 5px;
        }

        .notice-fee {
            color: #cc0000;
            font-weight: bold;
            margin-top: 8px;
        }

        .kindly-note {
            font-style: italic;
            margin-top: 5px;
            color: #555;
        }

        .footer {
            text-align: center;
            font-size: 8pt;
            margin-top: 20px;
            padding-top: 8px;
            border-top: 1px solid #ddd;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Letterhead Header - Same as admission page -->
        <div class="letterhead">
            <div class="school-name">GREAT MERCY EDUCATION CENTRE</div>
            <div class="school-motto">
                "CHARACTER WILL EARN YOU OPPORTUNITIES"
            </div>

            <div class="letterhead-row">
                <div class="letterhead-left">
                    <div class="contact-item">
                        <span class="contact-label">P.O Box:</span> <span class="contact-value">1665-30200, Kitale, Kenya</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-label">Tel:</span> <span class="contact-value">0729488356</span>
                    </div>
                </div>

                <div class="letterhead-center">
                    <img src="{{ public_path('logo.png') }}" alt="Great Mercy Logo" class="logo-center">
                </div>

                <div class="letterhead-right">
                    <div class="contact-item">
                        <span class="contact-label">Email:</span> <span class="contact-value email-value">gmcmorg@yahoo.com</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-label">Website:</span> <span class="contact-value website-value">greatmercy.wordpress.com</span>
                    </div>
                </div>
            </div>

            <div class="header-line-thick"></div>
            <div class="header-line-thin"></div>
        </div>

        <!-- Title -->
        <h2>GREAT MERCY SCHOOL FEE STRUCTURE FOR THE YEAR 2026</h2>

        <!-- Fee Table -->
        <table class="fee-table">
            <thead>
                <tr>
                    <th>CATEGORY</th>
                    <th>TERM ONE</th>
                    <th>TERM TWO</th>
                    <th>TERM THREE</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="category">PG</td>
                    <td>5,000</td>
                    <td>4,000</td>
                    <td>3,000</td>
                    <td class="total">12,000</td>
                </tr>
                <tr>
                    <td class="category">PP1 - PP2</td>
                    <td>9,000</td>
                    <td>7,500</td>
                    <td>4,500</td>
                    <td class="total">21,000</td>
                </tr>
                <tr>
                    <td class="category">G1 - G3 (DAY)</td>
                    <td>10,000</td>
                    <td>8,000</td>
                    <td>6,500</td>
                    <td class="total">24,500</td>
                </tr>
                <tr>
                    <td class="category">G1 - G3 (BOARDING)</td>
                    <td>13,000</td>
                    <td>10,000</td>
                    <td>8,000</td>
                    <td class="total">31,000</td>
                </tr>
                <tr>
                    <td class="category">G4 - G6 (DAY)</td>
                    <td>12,000</td>
                    <td>9,000</td>
                    <td>7,000</td>
                    <td class="total">28,000</td>
                </tr>
                <tr>
                    <td class="category">G4 - G6 (BOARDING)</td>
                    <td>15,000</td>
                    <td>12,000</td>
                    <td>10,000</td>
                    <td class="total">37,000</td>
                </tr>
                <tr>
                    <td class="category">G7 - G9 (DAY)</td>
                    <td>14,000</td>
                    <td>11,000</td>
                    <td>8,000</td>
                    <td class="total">33,000</td>
                </tr>
                <tr>
                    <td class="category">G7 - G9 (BOARDING)</td>
                    <td>17,000</td>
                    <td>14,000</td>
                    <td>11,000</td>
                    <td class="total">42,000</td>
                </tr>
            </tbody>
        </table>

        <!-- Payment Information -->
        <div class="payment-info">
            <p><strong>All school fees should be paid through our Co-operative Bank Acc. No: 01129599117900</strong></p>
            <p><strong>Account Name:</strong> Great Mercy Education Centre</p>
            <p><strong>M-PESA PAY BILL NO:</strong> 400200 <strong>ACCOUNT NO:</strong> 1075638</p>
            <p class="notice-fee"><strong>Admission fee Ksh.1,000 and interview fee of Ksh.1,000 to be paid upon arrival by new Students.</strong></p>
            <p class="kindly-note">Kindly, pay fees for better running of the school.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2026 Great Mercy Education Centre. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
