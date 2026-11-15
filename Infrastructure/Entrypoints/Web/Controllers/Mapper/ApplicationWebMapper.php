<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../../../Application/Services/Dto/Command/CreateApplicationCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Command/UpdateApplicationCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Command/DeleteApplicationCommand.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Query/GetApplicationByIdQuery.php';
require_once __DIR__ . '/../../../../../Application/Services/Dto/Response/ApplicationResponseDto.php';
require_once __DIR__ . '/../Request/CreateApplicationWebRequest.php';
require_once __DIR__ . '/../Request/UpdateApplicationWebRequest.php';
require_once __DIR__ . '/../Response/ApplicationResponse.php';

final class ApplicationWebMapper
{
    public function fromCreateRequestToCommand(CreateApplicationWebRequest $request): CreateApplicationCommand
    {
        return new CreateApplicationCommand(
            $request->nombre,
            $request->proveedor,
            $request->categoria,
            $request->lenguajePrincipal,
            $request->lenguajeSecundario,
            $request->usaBd,
            $request->requiereConexionRed,
            $request->numBits,
            $request->sistemaOperativo,
            $request->requisitosHardware,
            $request->licencia,
            $request->precio,
            $request->descripcion,
            $request->web,
            $request->correo,
            $request->tamanoInstalador
        );
    }

    public function fromUpdateRequestToCommand(UpdateApplicationWebRequest $request): UpdateApplicationCommand
    {
        return new UpdateApplicationCommand(
            $request->id,
            $request->nombre,
            $request->proveedor,
            $request->categoria,
            $request->lenguajePrincipal,
            $request->lenguajeSecundario,
            $request->usaBd,
            $request->requiereConexionRed,
            $request->numBits,
            $request->sistemaOperativo,
            $request->requisitosHardware,
            $request->licencia,
            $request->precio,
            $request->descripcion,
            $request->web,
            $request->correo,
            $request->tamanoInstalador
        );
    }

    public function fromIdToGetByIdQuery(string $id): GetApplicationByIdQuery
    {
        return new GetApplicationByIdQuery($id);
    }

    public function fromIdToDeleteCommand(string $id): DeleteApplicationCommand
    {
        return new DeleteApplicationCommand($id);
    }

    public function fromDtoToResponse(ApplicationResponseDto $dto): ApplicationResponse
    {
        return new ApplicationResponse(
            $dto->id(),
            $dto->nombre(),
            $dto->proveedor(),
            $dto->categoria(),
            $dto->lenguajePrincipal(),
            $dto->lenguajeSecundario(),
            $dto->usaBd(),
            $dto->requiereConexionRed(),
            $dto->numBits(),
            $dto->sistemaOperativo(),
            $dto->requisitosHardware(),
            $dto->licencia(),
            $dto->precio(),
            $dto->descripcion(),
            $dto->web(),
            $dto->correo(),
            $dto->tamanoInstalador()
        );
    }

    /**
     * @param ApplicationResponseDto[] $dtos
     * @return ApplicationResponse[]
     */
    public function fromDtosToResponses(array $dtos): array
    {
        return array_map(
            fn (ApplicationResponseDto $dto): ApplicationResponse => $this->fromDtoToResponse($dto),
            $dtos
        );
    }
}