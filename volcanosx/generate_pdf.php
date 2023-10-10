<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Function to generate a random date
function getRandomDate()
{
    $startDate = strtotime('20-06-2023');
    $endDate = strtotime('23-09-2023');
    $randomTimestamp = mt_rand($startDate, $endDate);
    return date("d/m/Y", $randomTimestamp);
}

// Function to generate a random payment status
function getRandomPaymentStatus()
{
    $statuses = ['Paid', 'Pending', 'Processing'];
    return $statuses[array_rand($statuses)];
}
function getRandomTRXID()
{
    // Generate a random TRXID using a combination of letters and numbers
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $trxid = '';
    $length = 8; // You can adjust the length as needed

    for ($i = 0; $i < $length; $i++) {
        $trxid .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $trxid;
}

// Check if the "Download PDF" button was clicked
if (isset($_POST['downloadPdfButton'])) {
    // Create a new PDF instance
    $pdf = new TCPDF();

    // Set PDF properties
    $pdf->SetCreator('Admin');
    $pdf->SetAuthor('admin');
    $pdf->SetTitle('Sales Report');
    $pdf->SetSubject('Sales Report');
    $pdf->SetKeywords('Sales Report, PDF, Example');

    // Add a page
    $pdf->AddPage();

    // Define the HTML content to be added to the PDF
    $html = '<h1 style="text-align: center; font-weight: bold;"><b>Armarra</b></h1>';
    $html .= '<p style="text-align: center;">Email: admin@armarra.com</p>';
    $html .= '<h2 style="text-align: center;"><i>Sales Report</i></h2>';
    $html .= '<table>';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>TrxID</th>';
    $html .= '<th>Customer Name</th>';
    $html .= '<th>Customer Email</th>';
    $html .= '<th>Customer Last Order Date</th>';
    $html .= '<th>Customer State</th>';
    $html .= '<th>Customer Orders Count</th>';
    $html .= '<th>Customer Total Spent</th>';
    $html .= '<th>Payment Status</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';

    $customerNames = [
        'Emily Davis',
        'Theodore Dinh',
        'Luna Sanders',
        'Penelope Jordan',
        'Austin Vo',
        'Joshua Gupta',
        'Ruby Barnes',
        'Luke Martin',
        'Easton Bailey',
        'Madeline Walker',
        'Savannah Ali',
        'Camila Rogers',
        'Eli Jones',
        'Everleigh Ng',
        'Robert Yang',
        'Isabella Xi',
        'Bella Powell',
        'Camila Silva',
        'David Barnes',
        'Adam Dang',
        'Elias Alvarado',
        'Eva Rivera',
        'Logan Rivera',
        'Leonardo Dixon',
        'Mateo Her',
        'Jose Henderson',
        'Abigail Mejia',
        'Wyatt Chin',
        'Carson Lu',
        'Dylan Choi',
        'Ezekiel Kumar',
        'Dominic Guzman',
        'Angel Powell',
        'Mateo Vu',
        'Caroline Jenkins',
        'Nora Brown',
        'Adeline Huang',
        'Jackson Perry',
        'Riley Padilla',
        'Leah Pena',
        'Owen Lam',
        'Kennedy Foster',
        'John Moore',
        'William Vu',
        'Sadie Washington',
        'Gabriel Holmes',
        'Wyatt Rojas',
        'Eva Coleman',
        'Dominic Clark',
        'Lucy Alexander',
        'Everleigh Washington',
        'Leilani Butler',
        'Peyton Huang',
        'John Contreras',
        'Rylee Yu',
        'Piper Lewis',
        'Stella Alexander',
        'Addison Do',
        'Zoey Jackson',
        'John Chow',
        'Ava Ayala',
        'Natalia Salazar',
        'Skylar Carrillo',
        'Christian Sanders',
        'Penelope Coleman',
        'Piper Richardson',
        'Everly Walker',
        'Aurora Ali',
        'Penelope Guerrero',
        'Anna Mehta',
        'William Foster',
        'Jade Rojas',
        'Isla Espinoza',
        'David Chu',
        'Thomas Padilla',
        'Miles Salazar',
        'Mila Hong',
        'Benjamin Moua',
        'Samuel Morales',
        'John Soto',
        'Joseph Martin',
        'Jose Ross',
        'Parker James',
        'Everleigh Fernandez',
        'Lincoln Hall',
        'Willow Mai',
        'Jack Cheng',
        'Genesis Navarro',
        'Eliza Hernandez',
        'Gabriel Brooks',
        'Jack Huynh',
        'Everly Chow',
        'Amelia Salazar',
        'Xavier Zheng',
        'Matthew Chau',
        'Mia Cheng',
        'Rylee Yu',
        'Zoe Romero',
        'Nolan Bui',
        'Nevaeh Jones',
        'Samantha Adams',
        'Madeline Shin',
        'Noah King',
        'Leilani Chow',
    ];

    $customerEmails = [];
    $domains = ['gmail.com', 'outlook.com', 'icloud.com']; // Add more domains as needed
    
    foreach ($customerNames as $name) {
        // Generate a random domain from the list
        $randomDomain = $domains[array_rand($domains)];
    
        // Generate email from the name and the selected domain
        $email = str_replace(' ', '', strtolower($name)) . '@' . $randomDomain;
        $customerEmails[] = $email;
    }
    

    for ($i = 0; $i < count($customerNames); $i++) {
        $trxid = getRandomTRXID();
        $customerName = $customerNames[$i];
        $customerEmail = $customerEmails[$i];
        $customerLastOrderDate = getRandomDate();
        $customerState = ($i % 2 == 0) ? 'Enabled' : 'Disabled';
        $customerOrdersCount = rand(1, 10);
        $customerTotalSpent = '$' . rand(100, 1000); // Add the dollar sign here
        $paymentStatus = getRandomPaymentStatus();

        // Append customer data to the HTML content
        $html .= '<tr>';
        $html .= '<td>' . $trxid . '</td>';
        $html .= '<td>' . $customerName . '</td>';
        $html .= '<td>' . $customerEmail . '</td>';
        $html .= '<td>' . $customerLastOrderDate. '</td>';
        $html .= '<td>' . $customerState. '</td>';
        $html .= '<td>' . $customerOrdersCount . '</td>';
        $html .= '<td>' . $customerTotalSpent . '</td>';
        $html .= '<td>' . $paymentStatus . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody>';
    $html .= '</table>';

    // Output the HTML content to the PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Set the response headers to prompt download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="customer_report.pdf"');

    // Output the PDF to the browser
    $pdf->Output('customer_report.pdf', 'D');
    exit;
}
?>
