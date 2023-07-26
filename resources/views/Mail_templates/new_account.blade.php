<html> 
    <head> 
        <title></title> 
    </head> 
    <body> 

        <p> Dear {{$details['name']}}, Your account has created Successfully. Use these credentials to login student panel</p><br>
        
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Email:</th><td>{{$details['email']}}</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Password:</th><td>{{$details['password']}}</td> 
            </tr> 
        </table> 
    </body>

</html>