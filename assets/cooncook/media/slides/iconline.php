<?php

class iconline extends preparecode
{

    public function replaceToHtml()
    {
        $matches = $this->getMatches(__CLASS__);
        if (isset($matches[0]) && is_array($matches[0])) {
            foreach ($matches[0] as $keyMatch => $matchValue) {
                $xmlDoc = $this->getDOM($matchValue);
                $nodeToRepalce = $xmlDoc->documentElement;
                $this->resetVars();
                //$this->startReplace($nodeToRepalce);
                $innerHTML = $matches[1][$keyMatch];
                $this->setRowContents($nodeToRepalce->getAttribute('icon'), $innerHTML);
                //$this->endReplace();
                $this->_content = str_replace($matchValue, $this->_stringToHtml, $this->_content);
            }
        }

        return $this->_content;
    }

    private function startReplace($nodeToRepalce)
    {
        $this->_stringToHtml .= ' ';
    }

    private function setRowContents($icon, $content)
    {
        if (!empty($content)) {
            $this->_stringToHtml .= '
			

			<div class="icon-set-wrap"><div class="icon-set"><a><i class="fa ' . $icon . '   "></i></a></div>' . $title . ' ' . $content . ' </div>
			
			
			
			';
        }
    }

    private function endReplace()
    {

        $this->_stringToHtml .= '';
    }

    private function resetVars()
    {
        $this->_stringToHtml = '';
    }

}
