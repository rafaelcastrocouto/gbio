<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Relatorio;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;
use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\ResultInterface;

class RelatorioPolicy implements BeforePolicyInterface
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
  
  public function canAdd(IdentityInterface $userSession, Relatorio $relatorioData)
  {
    if ($userSession and $userSession['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: relatorio add policy not allowed');
    }
  }
  
  public function canView()
  {
    if ($userSession and $userSession['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: relatorio add policy not allowed');
    }
  }
  
  public function canEdit()
  {
    if ($userSession and $userSession['supervisor_id']) {
      return new Result(true);
    } else {
      return new Result(false, 'Erro: relatorio add policy not allowed');
    }
  }
  
  public function canDelete()
  {
    return new Result(false, 'Erro: relatorio delete policy not allowed');
  }

}