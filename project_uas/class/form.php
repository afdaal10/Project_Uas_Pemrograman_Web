<?php
/**
 * Class Form
 * Untuk membuat form input secara dinamis
 */
class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;
    
    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }
    
    public function displayForm()
    {
        echo "<form action='".$this->action."' method='POST' enctype='multipart/form-data'>";
        echo '<table class="form-table">';
        for ($j=0; $j<count($this->fields); $j++) {
            echo "<tr>";
            echo "<td align='right'>".$this->fields[$j]['label']."</td>";
            
            if ($this->fields[$j]['type'] == 'textarea') {
                echo "<td><textarea name='".$this->fields[$j]['name']."' rows='5'>".$this->fields[$j]['value']."</textarea></td>";
            } elseif ($this->fields[$j]['type'] == 'select') {
                echo "<td><select name='".$this->fields[$j]['name']."'>";
                foreach ($this->fields[$j]['options'] as $val => $label) {
                    $selected = ($this->fields[$j]['value'] == $val) ? 'selected' : '';
                    echo "<option value='$val' $selected>$label</option>";
                }
                echo "</select></td>";
            } elseif ($this->fields[$j]['type'] == 'file') {
                echo "<td><input type='file' name='".$this->fields[$j]['name']."'></td>";
            } else {
                echo "<td><input type='".$this->fields[$j]['type']."' name='".$this->fields[$j]['name']."' value='".$this->fields[$j]['value']."'></td>";
            }
            
            echo "</tr>";
        }
        echo "<tr><td colspan='2'>";
        echo "<input type='submit' value='".$this->submit."' class='btn btn-primary'>";
        echo "</td></tr>";
        echo "</table>";
        echo "</form>";
    }
    
    public function addField($name, $label, $type='text', $value='', $options=array())
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['value'] = $value;
        $this->fields[$this->jumField]['options'] = $options;
        $this->jumField++;
    }
}
?>