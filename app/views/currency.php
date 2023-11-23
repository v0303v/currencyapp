<?php include 'header.php'; ?>

<?php require_once '../src/CurrencyHandler/CurrencyConverter.php';

$currencies = (new \app\CurrencyHandler\CurrencyConverter())->getCurrenciesList(); ?>

    <body>

<div class="container mt-5">
    <h1 class="mb-4">Конвертер валют</h1>

    <form action="" method="post" class="mb-4">

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="fromAmount" class="form-label">Сумма:</label>
                <input type="text" id="fromAmount" name="fromAmount" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="fromCurrency" class="form-label">Из валюты:</label>
                <select id="fromCurrency" name="fromCurrency" class="form-select">
                    <?php
                    foreach ($currencies as $currencyCode => $currencyName) {
                        echo "<option value=" . $currencyCode . ">$currencyName</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="toResult" class="form-label">Результат(в РУБ):</label>
                <input type="text" id="toResult" name="toResult" class="form-control" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="toAmount" class="form-label">Сумма(в РУБ):</label>
                <input type="text" id="toAmount" name="toAmount" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="toCurrency" class="form-label">В валюту:</label>
                <select id="toCurrency" name="toCurrency" class="form-select">
                    <?php
                    foreach ($currencies as $currencyCode => $currencyName) {
                        echo "<option value=" . $currencyCode . ">$currencyName</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="fromResult" class="form-label">Результат:</label>
                <input type="text" id="fromResult" name="fromResult" class="form-control" readonly>
            </div>
        </div>

        <button type="button" class="btn btn-primary" id="currencyForm">Конвертировать</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#currencyForm').click(function (event) {
            event.preventDefault();
            var fromAmount = $('#fromAmount').val();
            fromAmount = fromAmount ? parseFloat(fromAmount) : 0;
            var fromCurrency = $('#fromCurrency').val();
            var toAmount = $('#toAmount').val();
            toAmount = toAmount ? parseFloat(toAmount) : 0;
            var toCurrency = $('#toCurrency').val();
            $.ajax({
                type: 'POST',
                url: 'conversion',
                data: {
                    fromAmount: fromAmount,
                    fromCurrency: fromCurrency,
                    toAmount: toAmount,
                    toCurrency: toCurrency
                },
                success: function (response) {
                    var results = JSON.parse(response);
                    $('#toResult').val(results.toResult);
                    $('#fromResult').val(results.fromResult);
                }
            });
        });
    });
</script>

<?php include 'footer.php'; ?>