<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Gallery
 * @author Derrick
 */
class Gallery extends Application 
{
    public function index()
    {
        // get all the images from model
        $pix = $this->images->all();
        
        // build an array of formatted cells for them
        foreach ($pix as $picture)
        {
            $cells[] = $this->parser->parse('_cell', (array) $picture, true);
        }
        
        // prime the table class
        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class="gallery">',
            'cell_start' => '<td class="oneimage">',
            'cell_alt_start' => '<td calss="oneimage">'
        );
        
        $this->table->set_template($parms);
        
        // generate table
        $rows = $this->table->make_columns($cells, 3);
        $this->data['thetable'] = $this->table->generate($rows);
        
        $this->data['pagebody'] = 'gallery';
        $this->render();
        
    }
}
