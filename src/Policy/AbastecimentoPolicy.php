<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Abastecimento;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\ResultInterface;

class AbastecimentoPolicy implements BeforePolicyInterface
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
  
  public function canAdd(IdentityInterface $identity, Abastecimento $abastecimentoData)
  {
    if ($identity and ($identity['operador_id'] || $identity['supervisor_id'])) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimento add policy not allowed');
    }
    // if ($identity) {
    //   $user_data = $identity->getOriginalData();
    //   if ($user_data and ($user_data['operador_id'] || $user_data['supervisor_id'])) {
    //     return new Result(true);
    //   } else {
    //     return new Result(false, 'Erro: abastecimento add policy not allowed');
    //   }
    // }
  }
  
  public function canView(IdentityInterface $userSession, Abastecimento $abastecimentoData)
  {
    if ($userSession and ($userSession['operador_id'] || $userSession['supervisor_id'])) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimento add policy not allowed');
    }
  }
  
  public function canEdit(IdentityInterface $userSession, Abastecimento $abastecimentoData)
  {
    if ($userSession and ($userSession['operador_id'] && $this->sameUser($userSession, $abastecimentoData) || $userSession['supervisor_id'])) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimento add policy not allowed');
    }
  }
  
  public function canDelete()
  {
    return new Result(false, 'Erro: abastecimento delete policy not allowed');
  }
  
  protected function sameUser(IdentityInterface $userSession, Abastecimento $abastecimentoData)
  {
    return ($userSession->id == $abastecimentoData->user_id);
  }

}