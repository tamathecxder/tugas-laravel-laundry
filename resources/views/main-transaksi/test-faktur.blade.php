<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />

        <style>
            hr {
                color: #0000004f;
                margin-top: 5px;
                margin-bottom: 5px;
            }

            .add td {
                color: #c5c4c4;
                text-transform: uppercase;
                font-size: 12px;
            }

            .content {
                font-size: 14px;
            }
        </style>

        <title>Hello, world!</title>
    </head>
    <body>

        <div class="container-fluid mt-5 mb-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="d-flex flex-row p-2">
                            <div class="d-flex flex-column">
                                <span class="font-weight-bold"
                                    >Tax Invoice</span
                                >
                                <small>INV-001</small>
                            </div>
                        </div>
                        <hr />
                        <div class="table-responsive p-2">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="add">
                                        <td>To</td>
                                        <td>From</td>
                                    </tr>
                                    <tr class="content">
                                        <td class="fw-bold">
                                            Google <br />Attn: John Smith Pymont
                                            <br />Australia
                                        </td>
                                        <td class="fw-bold">
                                            Facebook <br />
                                            Attn: John Right Polymont <br />
                                            USA
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr />
                        <div class="products p-2">
                            <table class="table table-borderless">
                                <tbody>
                                    <!-- {{-- @foreach($paket as $data) --}} -->
                                    <tr class="add">
                                        <td>test</td>
                                        <td>Days</td>
                                        <td>Price</td>
                                        <td class="text-center">Total</td>
                                    </tr>
                                    <!-- {{-- @endforeach --}} -->
                                </tbody>
                            </table>
                        </div>
                        <hr />
                        <div class="products p-2">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="add">
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>GST(10%)</td>
                                        <td class="text-center">Total</td>
                                    </tr>
                                    <tr class="content">
                                        <td></td>
                                        <td>$40,000</td>
                                        <td>2,500</td>
                                        <td class="text-center">$42,500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr />
                        <div class="address p-2">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="add">
                                        <td>Bank Details</td>
                                    </tr>
                                    <tr class="content">
                                        <td>
                                            Bank Name : ADS BANK <br />
                                            Swift Code : ADS1234Q <br />
                                            Account Holder : Jelly Pepper <br />
                                            Account Number : 5454542WQR <br />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    --></body>
</html>
