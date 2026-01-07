<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Abastecimentognv;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\ResultInterface;

class AbastecimentognvPolicy implements BeforePolicyInterface
{
  
  public function before(?IdentityInterface $identity, mixed $resource, string $action): ResultInterface|bool|null
  {
    if ($identity) {
      $user_data = $identity->getOriginalData();
      if ($user_data and ($user_data['administrador_id'])) {
        return true;
      }
    }
    return null;
  }
  
  public function canAdd(IdentityInterface $userSession, Abastecimentognv $abastecimentognvData)
  {
    if ($userSession and ($userSession['operador_id'] || $userSession['supervisor_id'])) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimentognv add policy not allowed');
    }
    
  }
  
  public function canView(IdentityInterface $userSession, Abastecimentognv $abastecimentognvData)
  {
    if ($userSession and ($userSession['operador_id'] || $userSession['supervisor_id'])) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimentognv add policy not allowed');
    }
  }
  
  public function canEdit(IdentityInterface $userSession, Abastecimentognv $abastecimentognvData)
  {
    if ($userSession and ($userSession['operador_id'] && $this->sameUser($userSession, $abastecimentognvData) || $userSession['supervisor_id'])) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimentognv add policy not allowed');
    }
  }
  
  public function canDelete()
  {
    return new Result(false, 'Erro: abastecimentognv delete policy not allowed');
  }
  
  protected function sameUser(IdentityInterface $userSession, Abastecimentognv $abastecimentognvData)
  {
    return ($userSession->id == $abastecimentognvData->user_id);
  }

}