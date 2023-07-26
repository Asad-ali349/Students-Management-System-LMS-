<html> 
<head> 
    <title</title> 
</head> 
<body> 

    <p> Dear {{$details['name']}}, Kindly Pay your fee before due date</p><br>
    
    <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
        <tr> 
            <th>Due Amount:</th><td>{{$details['fee_amount']}}</td> 
        </tr> 
        <tr style="background-color: #e0e0e0;"> 
            <th>Due Date:</th><td>{{$details['due_date']}}</td> 
        </tr> 
    </table> 
</body>

</html>