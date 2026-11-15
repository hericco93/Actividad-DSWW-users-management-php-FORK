<?php

declare(strict_types=1);

require_once __DIR__ . '/Mapper/ApplicationWebMapper.php';
require_once __DIR__ . '/../../../../Application/Ports/In/CreateApplicationUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/UpdateApplicationUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/GetApplicationByIdUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/GetAllApplicationsUseCase.php';
require_once __DIR__ . '/../../../../Application/Ports/In/DeleteApplicationUseCase.php';

final class ApplicationController
{
    public function __construct(
        private CreateApplicationUseCase $createApplicationUseCase,
        private UpdateApplicationUseCase $updateApplicationUseCase,
        private GetApplicationByIdUseCase $getApplicationByIdUseCase,
        private GetAllApplicationsUseCase $getAllApplicationsUseCase,
        private DeleteApplicationUseCase $deleteApplicationUseCase,
        private ApplicationWebMapper $mapper
    ) {
    }

    /**
     * @return ApplicationResponse[]
     */
    public function index(): array
    {
        $applications = $this->getAllApplicationsUseCase->execute();

        return $this->mapper->fromDtosToResponses($applications);
    }

    public function show(string $id): ApplicationResponse
    {
        $query = $this->mapper->fromIdToGetByIdQuery($id);
        $application = $this->getApplicationByIdUseCase->execute($query);

        return $this->mapper->fromDtoToResponse($application);
    }

    public function store(CreateApplicationWebRequest $request): ApplicationResponse
    {
        $command = $this->mapper->fromCreateRequestToCommand($request);
        $application = $this->createApplicationUseCase->execute($command);

        return $this->mapper->fromDtoToResponse($application);
    }

    public function update(UpdateApplicationWebRequest $request): ApplicationResponse
    {
        $command = $this->mapper->fromUpdateRequestToCommand($request);
        $application = $this->updateApplicationUseCase->execute($command);

        return $this->mapper->fromDtoToResponse($application);
    }

    public function delete(string $id): void
    {
        $command = $this->mapper->fromIdToDeleteCommand($id);
        $this->deleteApplicationUseCase->execute($command);
    }
}