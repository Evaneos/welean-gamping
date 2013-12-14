<?php
namespace Gamping\Model\Currency;

use Berthe\Fetcher;
class Manager extends \Berthe\AbstractManager
{

    public function getVoForCreation()
    {
        return new VO();
    }
    
    /**
     * 
     * @param string $currencyCode
     * @throws \RuntimeException when there is more than one currency with the same code.
     * @return \Gamping\Model\Currency\VO or null if no match was found.
     */
    public function getByCode($currencyCode)
    {
        $paginator = new Fetcher();
        $paginator->addFilter('code', Fetcher::TYPE_EQ, $currencyCode);
        
        $results = $this->getByPaginator($paginator)->getResultSet();
        $count = count($results);
        
        if ($count > 1) {
            throw new \RuntimeException(sprintf('There should only be one currency with code "%s".', $currencyCode));
        }
        
        if ($count == 0) {
            return null;
        }
        
        return reset($results);
    }
}