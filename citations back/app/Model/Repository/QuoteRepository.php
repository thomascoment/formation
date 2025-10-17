<?php

declare(strict_types=1);

namespace App\Model\Repository;

use React\Dns\Query\Query;
use App\Model\Entity\Author;
use App\Model\Entity\Quote;

class QuoteRepository extends AbstractRepository
{
    protected string $table = 'quote';
    protected string $entity = 'Quote';


    public function findAll(): array
    {
        $sql = 'SELECT quote.id, quote.quote, author.id as author_id, author.author
FROM quote
LEFT JOIN author ON author.id = quote.author_id';
        $q = $this->statement($sql);
        $result = $q->fetchAll();

        $quotes = [];
        foreach ($result as $row){
            $author = new Author();
            if($row['author_id'] !== null){
                $author->hydrate([
                    'id' => $row['author_id'],
                    'author' => $row['author']
                ]);

            
            // Comment qu'on fait si author anonyme
        }
            $quote = new Quote();
            $quote->hydrate([
                'id' => $row['id'],
                'quote' => $row['quote'],
                'author' => $author,
            ]);

            $quotes[] = $quote;
        }
        return $quotes;
        
    }

}