<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Cliente;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\ResultInterface;

class ClientePolicy implements BeforePolicyInterface
{
  
  public function before(?IdentityInterface $identity, mixed $resource, string $action): ResultInterface|bool|null
  {
    if ($identity) {
      $user_data = $identity->getOriginalData();
      if ($user_data and $user_data['administrador_id']) {
        return true;
      }
    }
    return null;
  }
    
  public function canIndex(IdentityInterface $user_data, Cliente $clienteData)
  {
    if ($user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: cliente index policy not allowed');
    }
  }
  
  public function canAdd(IdentityInterface $user_data, Cliente $clienteData)
  {
    return new Result(false, 'Erro: cliente add policy not allowed');
  }
  
  public function canView(IdentityInterface $user_data, Cliente $clienteData)
  {
    if ($user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: cliente view policy not allowed');
    }
  }
  
  public function canEdit(IdentityInterface $user_data, Cliente $clienteData)
  {
    return new Result(false, 'Erro: cliente edit policy not allowed');
  }
  
  public function canDelete(IdentityInterface $user_data, Cliente $clienteData)
  {
    return new Result(false, 'Erro: cliente delete policy not allowed');
  }

}