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
    public function canIndex(IdentityInterface $user_data, Abastecimentognv $abastecimentognvData)
  {
    if ($user_data['operador_id'] || $user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimento index policy not allowed');
    }
  }
  
  public function canAdd(IdentityInterface $user_data, Abastecimentognv $abastecimentognvData)
  {
    if ($user_data['operador_id'] || $user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimento add policy not allowed');
    }
  }
  
  public function canView(IdentityInterface $user_data, Abastecimentognv $abastecimentognvData)
  {
    if ($user_data['operador_id'] || $user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimento view policy not allowed');
    }
  }
  
  public function canEdit(IdentityInterface $user_data, Abastecimentognv $abastecimentognvData)
  {
    if (($user_data['operador_id'] && $this->sameUser($user_data, $abastecimentognvData)) || $user_data['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: abastecimentognv edit policy not allowed');
    }
  }
  
  public function canDelete(IdentityInterface $user_data, Abastecimentognv $abastecimentognvData)
  {
    return new Result(false, 'Erro: abastecimentognv delete policy not allowed');
  }
  
  protected function sameUser(IdentityInterface $user_data, Abastecimentognv $abastecimentognvData)
  {
    return ($user_data->id == $abastecimentognvData->user_id);
  }

}