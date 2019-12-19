<html>

    <head>

        <title>Safeer Enquiry</title>

    </head>

    <body>
                    <table>

                            <tr>
                                <td>
                                
                                <table style="background-color:#ccc" cellpadding="5" cellspacing="1">
                                            <tr style="background-color:#fff">                                                
                                                <th>Customer</th>
                                                <td><?php echo $userData['firstname']?> <?php echo $userData['lastname']?></td>
                                            </tr>
                                            <tr style="background-color:#fff">                                               
                                                <th>Email</th>
                                                <td><?php echo $userData['email']?></td>
                                            </tr>
                                            <tr style="background-color:#fff">                                               
                                                <th>Phone</th>
                                                <td><?php echo $userData['phone']?></td>
                                            </tr>

                                            <tr style="background-color:#fff">                                               
                                                <th>Item Code</th>
                                                <td><?php echo $tyreData['title']?></td>
                                            </tr>
                                            <tr style="background-color:#fff">                                               
                                                <th>Item Description</th>
                                                <td><?php echo $tyreData['description']?></td>
                                            </tr>

                                            <tr style="background-color:#fff">                                               
                                                <th>Query</th>
                                                <td><?php echo $query['comment']?></td>
                                            </tr>
                                </table>                
                                
                                </td>

                            </tr>

                            

                            

                </table>

    </body>

</html>