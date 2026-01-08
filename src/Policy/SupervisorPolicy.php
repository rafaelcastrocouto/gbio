<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Supervisor;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\ResultInterface;

class SupervisorPolicy implements BeforePolicyInterface
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
  
  public function canIndex(IdentityInterface $user_data, Supervisor $operadorData)
  {
    if ($user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: supervisor index policy not authorized');
    }
  }
  
  public function canAdd(IdentityInterface $user_data, Supervisor $supervisorData)
  {
    return new Result(false, 'Erro: operador add policy not authorized');
  }
  
  public function canView(IdentityInterface $user_data, Supervisor $supervisorData)
  {
    if ($this->sameUser($user_data, $supervisorData)) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: operador view policy not authorized');
    }
  }
  
  public function canEdit(IdentityInterface $user_data, Supervisor $supervisorData)
  {
    if ($this->sameUser($user_data, $supervisorData)) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: supervisor edit policy not authorized');
    }
  }
  
  public function canDelete(IdentityInterface $user_data, Supervisor $supervisorData)
  {
    return new Result(false, 'Erro: supervisor delete policy not allowed');
  }

  
  protected function sameUser(IdentityInterface $user_data, Supervisor $supervisorData)
  {
    return ($user_data->id == $supervisorData->user_id);
  }
  
}