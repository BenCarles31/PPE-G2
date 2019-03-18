<?php
/*session_start();*/



require('lib/fpdf/fpdf.php');/*erreurs failed to open stream: No such file or directory in D:\xampp\htdocs\projet\PPE-G2-final\form\pdf.php on line 7
*/
/*$clu = $ClubDAO->findAllClub();*/
class MON_PDF extends FPDF {

    function Header() {
        // Logo
        $this->Image('img/logo.png',10,0,0,25);
        // Police Arial gras 15
        $this->SetFont('Arial','B',20);
        // Titre
        $this->Cell(0,10,'Recu dons aux oeuvres ','B',0,'C');
        $this->SetFont('Arial','B',10);
        $this->Ln(20);
        $this->Cell(0,10,'Articles 200 et 238 bis du Code general des impots','B',5,'C'); /*n'est pas au bonne endroit  */
        // Saut de ligne
        $this->Cell(0,10,'Beneficiaire des versements',1,1,'C');/*je dois fermé le cadre et le grisé       * */
        $this->Ln(20);
        $this->SetFont('Times','B',12);
        $this->Cell(0,0,'Nom ou denomination : ',0,1,'L');
        $this->Ln(20);
        /* $this->Cell(0,10,$clu->get_Adresse_club(),1,1,'C');*/
        $this->Cell(0,0,'Adresse : ',0,1,'L');
        $this->Ln(20);
        $this->Cell(0,0,'Objet : ',0,1,'L');
        $this->Ln(20);
        $this->Ln(20);
        $this->Cell(0,10,'Donateur',1,1,'C');/*je dois fermé le cadre et le grisé       * */
        $this->Ln(20);
        $this->Cell(0,0,'Nom : ',0,1,'L');
        $this->Ln(10);
        $this->Cell(0,0,'Adresse : ',0,1,'L');
        $this->Ln(10);
        $this->Cell(0,0,'code postal : ',0,1,'L');$this->Ln(10);$this->Cell(0,0,'Commune : ',0,1,'L');
        $this->Ln(10);
        $this->Cell(0,0,'Le benficiaire reconnait avoir reçu au titre des versements ouvrant droit à réduction d\'impot, la somme de :  ',0,1,'L');
        $this->Ln(5);
        $this->Cell(0,0,' :  ',0,1,'L');
        $this->Ln(10);
        $this->Cell(0,0,'Somme en toutes lettres  :  ',0,1,'L');
        $this->Ln(10);
        $this->Cell(0,0,'Date de paiment :  ',0,1,'L');
        $this->Ln(10);
        $this->Cell(0,0,'Mode de versement :  ',0,1,'L');
        $this->Ln(10);
        $this->Cell(0,10,'Donateur',1,1,'C');







      }
      function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}','T',0,'C');
      }
    }

    // Instanciation de l'objet dérivé
    $pdf = new MON_PDF();

    // Création d'une page
    $pdf->AddPage();

    // Définit l'alias du nombre de pages {nb}
    $pdf->AliasNbPages();

    // Boucle des lignes


    // Génération du document PDF
    $pdf->Output();
    ?>
