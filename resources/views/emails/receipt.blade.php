<html><head><style>
        table {
            border-collapse: collapse;
            width: 900px;
        }
        table #receipt {
            border: 1px solid black;
        }
        table #receipt td {
            border: 1px solid black;
            text-align: left;
        }
        table #receipt th {
            border: 1px solid black;
        }
        .notbold{
            font-weight:normal;
        }
         body {
             margin: 0 auto;
             padding: 0;
             text-align: center; /* !!! */
             width: 900px;
         }

    </style>
</head><body>
<div style="width:204px;text-justify: inter-word; margin: 0 auto;" align="center">
    <table align="center" width="204">
    <div style="text-align: center">
        <img src="http://www.utsc.utoronto.ca/~webtest/tcardplus/TCard_Logo-204px-w.png" alt="TCard Logo" style="width:204px; height:82px; display: block;" align="middle">
    </div>
        <div style="text-align: justify">
    <br>
    Dear {{$first}},
    <br>
    <br>Thanks for choosing <span style="font-weight: bold"> TCard<sup>+</sup>!</span>
    <br>
    This is an official confirmation of your Meal Plan/TBucks purchase you made.
    <br>
    <table id="receipt">
        <thead>
        <tr>
            <th class="notbold" bgcolor="#CBE5FF" align="left">Payment information:</th>
            <th class="notbold" bgcolor="#CBE5FF" align="left">Order Date: {{$created_date}}</th>
            <th class="notbold" bgcolor="#CBE5FF" align="left">Order #{{$order}}</th>
        </tr>
        </thead>

        <tbody><tr>
            <td>{{$meal_plan}}</td>
            <td>{{$payment_method}}</td>
            <td>${{$plan_amount}}</td>
        </tr>

        <tr>
            <td>Additional TBucks</td>
            <td> @if ($additional > 0)
                    {{$payment_method}}
                @endif

            </td>
            <td>
                @if ($additional == 0)
                    $0.00
                @else
                    ${{number_format($additional, 2)}}
                @endif
            </td>
        </tr>


        <tr>
            <td></td>
            <td style="font-weight: bold">Total Purchase:</td>
            <td style="font-weight: bold">${{$total}}</td>
        </tr>
        </tbody></table>
    <br>
    If any of this information does not match your records, please contact us at <a style="color: #0000ff" href="tcardplus@utsc.utoronto.ca">tcardplus@utsc.utoronto.ca</a> as soon as possible.<br><br>
    Did you know, you can check your account balance, keep track of your transactions, and also deposit additional TBucks online? Just visit our <a style="color: #0000ff" href="http://www.utsc.utoronto.ca/tcardplus">online portal</a>.<br><br>
    By purchasing a Meal Plan or depositing funds into your TBucks, you are agreeing to the terms and conditions of the TCard Plus Program and all of its policies, which can be found <span style="text-decoration: underline;color: #0000ff"><a style="color: #0000ff" href="http://www.utsc.utoronto.ca/tcardplus/agreements-and-policies">here</a></span>. Please take time to review these documents.*<br><br>
    You can find an updated list of TCard+ on and off campus merchants, as well as ongoing promotions and contests at our <a style="color: #0000ff" href="http://www.utsc.utoronto.ca/tcardplus">website</a>. If you have any questions, please do not hesitate to contact us at <a style="color: #0000ff" href="tcardplus@utsc.utoronto.ca">tcardplus@utsc.utoronto.ca</a>.<br><br>
    Your funds are ready for use. Enjoy!<br><br>
    <div style="font-weight: bold">TCard<sup>+</sup></div>
    utsc.utoronto.ca/tcardplus<br>
    <a style="color: #0000ff" href="tcardplus@utsc.utoronto.ca">tcardplus@utsc.utoronto.ca</a>
    <br>
    <br>
    <br>
    <span style="font-size: 10px"> *if you have any questions about the Terms and Conditions of the TCard<sup>+</sup> program or do not agree with any of the terms, please contact us immediately at <a style="color: #0000ff" href="tcardplus@utsc.utoronto.ca">tcardplus@utsc.utoronto.ca</a></span>
    <br>
    <br></div>
    <img src="http://www.utsc.utoronto.ca/~webtest/tcardplus/picture.jpg" alt="TCard Picture">
    </table>

</div>



</body></html>
