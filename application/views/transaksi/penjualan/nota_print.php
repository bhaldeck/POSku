<html moznomarginboxes mozdisallowselectionprint>
    <head>
        <title>POS - Print Nota</title>
        <style type="text/css">
            html { font-family: "Verdana, Arial"; }
            .content {
                width: 80mm;
                font-size: 12px;
                padding: 5px;
            }

            .title {
                text-align: center;
                font-size: 13px;
                padding-bottom: 5px;
                border-bottom: 1px dashed;
            }

            .head {
                margin-top: 5px;
                margin-bottom: 10px;
                padding-bottom: 10px;
                border-bottom: 1px solid;
            }

            table {
                width: 100%;
                font-size: 12px;
            }

            .thanks {
                margin-top: 10px;
                padding-top: 10px;
                text-align: center;
                border-top: 1px dashed;
            }

            @media print {
                @page {
                    width: 80mm;
                    margin: 0mm;
                }
            }
        </style>
    </head>
    <body onload="window.print()">
        <div class="content">
            <div class="title">
                <b>Toko Kang Udin</b>
                <br>
                Jl. Sultan Ageng Tirtayasa Kunciran-Kota Tangerang
            </div>

            <div class="head">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="width: 200px">
                            <?php
                            echo Date("d/m/Y", strtotime($sale->tanggal))." ". Date("H:i", strtotime($sale->penjualan_created));
                            ?>
                        </td>
                        <td>Kasir</td>
                        <td style="text-align:center; width: 10px;">:</td>
                        <td style="text-align:right;">
                            <?=ucfirst($sale->user_name) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?=$sale->invoice?>
                        </td>
                        <td>Pelanggan</td>
                        <td style="text-align:center;">:</td>
                        <td style="text-align:right;">
                            <?=$sale->pelanggan_id == null ? "Umum" : $sale->pelanggan_nama ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="transaction">
                <table class="transaction-table" cellspacing="0" cellpadding="0">
                    <?php
                    $arr_discount = array();
                    foreach ($sale_detail as $key => $value) { ?>
                        <tr>
                            <td style="width: 165px"><?=$value->barang_nama ?></td>
                            <td><?=$value->qty?></td>
                            <td style="text-align:right; width: 60px;"><?=rupiah($value->harga)?></td>
                            <td style="text-align:right; width: 60px;">
                            <?=rupiah($value->harga * $value->qty)?>
                        </td>
                        </tr>

                        <?php 
                        if($value->barang_disc > 0) {
                            $arr_discount[] = $value->barang_disc;
                        }
                    }

                    foreach ($arr_discount as $key => $value) { ?>
                        <tr>
                            <td></td>
                            <td colspan="2" style="text-align:right">Disc. @#<?=($key+1)?></td>
                            <td style="text-align:right"><?=rupiah($value)?></td>
                        </tr>
                    <?php
                    } ?>

                    <tr>
                        <td colspan="4" style="border-bottom:1px dashed; padding-top:5px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td style="text-align:right; padding: top 5px;">Subtotal</td>
                        <td style="text-align:right; padding: top 5px;">
                            <?=rupiah($sale->total_harga)?>
                        </td>
                    </tr>
                    <?php if($sale->diskon > 0) { ?>
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right; padding: bottom 5px;">Disc. jual</td>
                            <td style="text-align:right; padding: bottom 5px;"><?=rupiah($sale->diskon)?></td>
                        </tr>
                    <?php
                    } ?>
                    <tr>
                        <td colspan="2"></td>
                        <td style="border-top:1px dashed; text-align:right; padding: 5px 0;">Grand Total</td>
                        <td style="border-top:1px dashed; text-align:right; padding: 5px 0;"><?=rupiah($sale->harga_final)?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td style="border-top:1px dashed; text-align:right; padding-top: 5px;">Tunai</td>
                        <td style="border-top:1px dashed; text-align:right; padding-top: 5px;"><?=$sale->tunai?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td style="text-align:right">Kembali</td>
                        <td style="text-align:right"><?=$sale->kembali?></td>
                    </tr>
                </table>
            </div>
            <div class="thanks">
                    ~~Terima Kasih ~~
                    <br>
                    Toko Kang Udin
            </div>
        </div>
    </body>
</html>