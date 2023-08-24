<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Rapport</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Boulangerie {{$ventilation->value('nom_complet')}}</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Vent: #6</span> <br>
                    <span>{{date('d-m-Y')}}</span> <br>
                    <span>Address: </span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Commission</th>
                <th width="50%" colspan="2">Livreur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Taux:</td>
                <td>10%</td>

                <td>Matricule:</td>
                <td>{{$ventilation->value('matricule')}}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>funda-CRheOqspbA</td>

                <td>Prénom:</td>
                <td>{{$ventilation->value('prenom')}}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>22-09-2022 10:54 AM</td>

                <td>Nom:</td>
                <td>{{$ventilation->value('nom')}}</td>
            </tr>
            <tr>
                <td>Mode Paiement:</td>
                <td>Cash on Delivery</td>

                <td>telephone:</td>
                <td>{{$ventilation->value('telephone')}}</td>
            </tr>
        
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Ventilation
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Date</th>
                <th>Ventile</th>
                <th>Non Ventile</th>
                <th>Retour</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventilation as $ventilation )           
            <tr>
                <td width="5%">{{$loop->index+1}}</td>
                <td width="10%">{{$ventilation->date_ventilation}}</td>
                <td width="10%">{{$ventilation->ventile}}</td>
                <td width="10%">{{$ventilation->non_ventile}}</td>
                <td width="15%" class="fw-bold">{{$ventilation->retour}}</td>
            </tr>
            @endforeach
            
            <tr>
                <td colspan="4" class="total-heading">Total </td>
                <td colspan="1" class="total-heading">14699</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Merci pour la confiance
    </p>

</body>
</html>