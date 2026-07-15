<?php

class librosActions extends sfActions
{
    public function executeIndex(sfWebRequest $request){
        $query = trim($request->getParameter('q', 'symfony'));
        $this->query = $query;
        $this->libros = array();
        $this->error  = null;
        
        $url = 'https://openlibrary.org/search.json?q='.urlencode($query).'&limit=50';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);


        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false || $httpCode !== 200){
            $this->error = 'No se pudo conectar con Open Library.';
            return sfView::SUCCESS;
        }

        $data = json_decode($response, true);

        if (isset($data['docs'])){
            $this->libros = $data['docs'];
        }

        return sfView::SUCCESS;
    }
}