<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\AbastecimentosTable;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Authorization\Policy\BeforeScopeInterface;
use Authorization\Policy\ResultInterface;

class AbastecimentosTablePolicy implements BeforeScopeInterface
{
  
  public function beforeScope(?IdentityInterface $identity, mixed $resource, string $action): ResultInterface|bool|null
  {
    if ($identity) {
      $user_data = $identity->getOriginalData();
      
      if ($user_data and ($user_data['operador_id'] || $user_data['supervisor_id'] || $user_data['administrador_id'])) {
        return true;
      } else {
        return false;
      }
    }
    return null;
  }
  
  public function scopeIndex($user, $query)
  {
    
    pr($user);
    die();
    return $query->where(['Abastecimentos.user_id' => $user->getIdentifier()]);
  }
  
}