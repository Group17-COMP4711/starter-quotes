<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'],
                            'mug' => $record['mug'], 'href' => $record['where'],
                            'what' => $record['what']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}


	/**
     *  choose one of quote entries
     */
    public function random() {
        // this is the view we want shown
        $this->data['pagebody'] = 'homepage';

        // build the list of authors, to pass on to our view
        $source = $this->quotes->all();
        $authors = array();

        //get random record
        $num = rand(0, sizeof($source) - 1);
        $record = $source[$num];

        $authors[] = array ('what' => $record['what'],
            'who' => $record['who'],
            'mug' => $record['mug'],
            'href' => $record['where']);

        $this->data['authors'] = $authors;

        $this->render();

    }

}
