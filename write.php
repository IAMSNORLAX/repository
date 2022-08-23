<!DOCTYPE>

<html>
<head>
    <meta charset = 'utf-8'>
</head>
<style>
    table.table2{
        border-collapse: seperate;
        border-spacing: 1px;
        text-align: left;
        line-height: 1.5;
        border-top: 1px;
        margin : 20px 10px;
    }
    table.table2 tr{
        width: 50px;
        padding: 10px;
        font-weight: bold;
        vertical-align: top;
        border-bottom: 1px;

    }
    table.table2 td{
        width: 100px;
        padding: 10px;
        vertical-align: top;
        border-bottom: 1px;
    }
</style>
<body>
    <form method = "post" action = "write_action.php">
    <table style="padding-top:50px" align = center width=700 border=0 cellpadding=0>
        <tr>
            <td height=20 align= center bgcolor=#ccc><font color=white W R I T E </font></td>
            </tr>
            <tr>
            <td bgcolor=white>
            <table class = "table2">
                    <tr>
                        <td>WRITER</td>
                        <td><input type = text name = name size=20> </td>
                    </tr>

                    <tr>
                        <td>TITLE</td>
                        <td><input type = text name = name size=20> </td>
                        </tr>

                    <tr>
                        <td>CONTENT</td>
                        <td><textarea name = content cols=85 rows 15></textarea></td>
                        </tr>
                        
                    <tr>
                        <td>PASSWORD</td>
                        <td><input type = password name = pw size=10 maxlength=10></td>
                         </tr>
                        </table>
                        
                    <center>
                        <input type = "submit" value="W R I T E">
                    </center>
                </td>
            </tr>

        </table>
    </form>
</body>
</html>
