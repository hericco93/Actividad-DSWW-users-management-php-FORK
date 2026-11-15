<?php

declare(strict_types=1);

final class ClassLoader
{
    /**
     * @var array<string, string>
     */
    private static array $classMap = array(
        'InvalidUserEmailException' => 'Domain/Exceptions/InvalidUserEmailException.php',
        'InvalidUserIdException' => 'Domain/Exceptions/InvalidUserIdException.php',
        'InvalidUserNameException' => 'Domain/Exceptions/InvalidUserNameException.php',
        'InvalidUserPasswordException' => 'Domain/Exceptions/InvalidUserPasswordException.php',
        'InvalidUserRoleException' => 'Domain/Exceptions/InvalidUserRoleException.php',
        'InvalidUserStatusException' => 'Domain/Exceptions/InvalidUserStatusException.php',
        'UserAlreadyExistsException' => 'Domain/Exceptions/UserAlreadyExistsException.php',
        'UserNotFoundException' => 'Domain/Exceptions/UserNotFoundException.php',
        'InvalidCredentialsException' => 'Domain/Exceptions/InvalidCredentialsException.php',

        'UserRoleEnum' => 'Domain/Enums/UserRoleEnum.php',
        'UserStatusEnum' => 'Domain/Enums/UserStatusEnum.php',

        'UserId' => 'Domain/ValueObjects/UserId.php',
        'UserName' => 'Domain/ValueObjects/UserName.php',
        'UserEmail' => 'Domain/ValueObjects/UserEmail.php',
        'UserPassword' => 'Domain/ValueObjects/UserPassword.php',

        'UserModel' => 'Domain/Models/UserModel.php',
        'EmailDestinationModel' => 'Domain/Models/EmailDestinationModel.php',
        'EmailSenderException' => 'Domain/Exceptions/EmailSenderException.php',
        'EmailSenderPort' => 'Application/Ports/Out/EmailSenderPort.php',
        'EmailNotificationService' => 'Application/Services/EmailNotificationService.php',
        'EmailSenderService' => 'Infrastructure/Adapters/Email/EmailSenderService.php',

        'CreateUserUseCase' => 'Application/Ports/In/CreateUserUseCase.php',
        'UpdateUserUseCase' => 'Application/Ports/In/UpdateUserUseCase.php',
        'GetUserByIdUseCase' => 'Application/Ports/In/GetUserByIdUseCase.php',
        'GetAllUsersUseCase' => 'Application/Ports/In/GetAllUsersUseCase.php',
        'DeleteUserUseCase' => 'Application/Ports/In/DeleteUserUseCase.php',
        'LoginUseCase' => 'Application/Ports/In/LoginUseCase.php',

        'SaveUserPort' => 'Application/Ports/Out/SaveUserPort.php',
        'UpdateUserPort' => 'Application/Ports/Out/UpdateUserPort.php',
        'GetUserByIdPort' => 'Application/Ports/Out/GetUserByIdPort.php',
        'GetUserByEmailPort' => 'Application/Ports/Out/GetUserByEmailPort.php',
        'GetAllUsersPort' => 'Application/Ports/Out/GetAllUsersPort.php',
        'DeleteUserPort' => 'Application/Ports/Out/DeleteUserPort.php',

        'CreateUserCommand' => 'Application/Services/Dto/Commands/CreateUserCommand.php',
        'UpdateUserCommand' => 'Application/Services/Dto/Commands/UpdateUserCommand.php',
        'DeleteUserCommand' => 'Application/Services/Dto/Commands/DeleteUserCommand.php',
        'LoginCommand' => 'Application/Services/Dto/Commands/LoginCommand.php',
        'GetUserByIdQuery' => 'Application/Services/Dto/Queries/GetUserByIdQuery.php',
        'GetAllUsersQuery' => 'Application/Services/Dto/Queries/GetAllUsersQuery.php',

        'CreateUserService' => 'Application/Services/CreateUserService.php',
        'UpdateUserService' => 'Application/Services/UpdateUserService.php',
        'GetUserByIdService' => 'Application/Services/GetUserByIdService.php',
        'GetAllUsersService' => 'Application/Services/GetAllUsersService.php',
        'DeleteUserService' => 'Application/Services/DeleteUserService.php',
        'LoginService' => 'Application/Services/LoginService.php',
        'UserApplicationMapper' => 'Application/Services/Mappers/UserApplicationMapper.php',

        'Connection' => 'Infrastructure/Adapters/Persistence/MySQL/Config/Connection.php',
        'UserPersistenceDto' => 'Infrastructure/Adapters/Persistence/MySQL/Dto/UserPersistenceDto.php',
        'UserEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/UserEntity.php',
        'UserPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/UserPersistenceMapper.php',
        'UserRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/UserRepositoryMySQL.php',

        'CreateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateUserRequest.php',
        'UpdateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateUserRequest.php',
        'LoginWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/LoginWebRequest.php',
        'UserResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UserResponse.php',
        'UserWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/UserWebMapper.php',
        'UserController' => 'Infrastructure/Entrypoints/Web/Controllers/UserController.php',
        'WebRoutes' => 'Infrastructure/Entrypoints/Web/Controllers/Config/WebRoutes.php',

        'View' => 'Infrastructure/Entrypoints/Web/Presentation/View.php',
        'Flash' => 'Infrastructure/Entrypoints/Web/Presentation/Flash.php',

        'DependencyInjection' => 'Common/DependencyInjection.php',

        // --- Entidad Aplicacion ---
        'InvalidApplicationIdException' => 'Domain/Exceptions/InvalidApplicationIdException.php',
        'InvalidApplicationDataException' => 'Domain/Exceptions/InvalidApplicationDataException.php',
        'InvalidApplicationArchitectureException' => 'Domain/Exceptions/InvalidApplicationArchitectureException.php',
        'InvalidApplicationLicenseException' => 'Domain/Exceptions/InvalidApplicationLicenseException.php',
        'ApplicationAlreadyExistsException' => 'Domain/Exceptions/ApplicationAlreadyExistsException.php',
        'ApplicationNotFoundException' => 'Domain/Exceptions/ApplicationNotFoundException.php',

        'ApplicationBitsEnum' => 'Domain/Enums/ApplicationBitsEnum.php',
        'ApplicationLicenseEnum' => 'Domain/Enums/ApplicationLicenseEnum.php',

        'ApplicationId' => 'Domain/ValueObjects/ApplicationId.php',
        'ApplicationPrice' => 'Domain/ValueObjects/ApplicationPrice.php',
        'ApplicationInstallerSize' => 'Domain/ValueObjects/ApplicationInstallerSize.php',
        'ApplicationWebUrl' => 'Domain/ValueObjects/ApplicationWebUrl.php',
        'ApplicationContactEmail' => 'Domain/ValueObjects/ApplicationContactEmail.php',

        'ApplicationCreatedDomainEvent' => 'Domain/Events/ApplicationCreatedDomainEvent.php',
        'ApplicationUpdatedDomainEvent' => 'Domain/Events/ApplicationUpdatedDomainEvent.php',
        'ApplicationDeletedDomainEvent' => 'Domain/Events/ApplicationDeletedDomainEvent.php',

        'ApplicationModel' => 'Domain/Models/ApplicationModel.php',

        'CreateApplicationUseCase' => 'Application/Ports/In/CreateApplicationUseCase.php',
        'UpdateApplicationUseCase' => 'Application/Ports/In/UpdateApplicationUseCase.php',
        'DeleteApplicationUseCase' => 'Application/Ports/In/DeleteApplicationUseCase.php',
        'GetApplicationByIdUseCase' => 'Application/Ports/In/GetApplicationByIdUseCase.php',
        'GetAllApplicationsUseCase' => 'Application/Ports/In/GetAllApplicationsUseCase.php',

        'SaveApplicationPort' => 'Application/Ports/Out/SaveApplicationPort.php',
        'UpdateApplicationPort' => 'Application/Ports/Out/UpdateApplicationPort.php',
        'DeleteApplicationPort' => 'Application/Ports/Out/DeleteApplicationPort.php',
        'GetApplicationByIdPort' => 'Application/Ports/Out/GetApplicationByIdPort.php',
        'GetAllApplicationsPort' => 'Application/Ports/Out/GetAllApplicationsPort.php',

        'CreateApplicationCommand' => 'Application/Services/Dto/Command/CreateApplicationCommand.php',
        'UpdateApplicationCommand' => 'Application/Services/Dto/Command/UpdateApplicationCommand.php',
        'DeleteApplicationCommand' => 'Application/Services/Dto/Command/DeleteApplicationCommand.php',
        'GetApplicationByIdQuery' => 'Application/Services/Dto/Query/GetApplicationByIdQuery.php',
        'ApplicationResponseDto' => 'Application/Services/Dto/Response/ApplicationResponseDto.php',

        'ApplicationMapper' => 'Application/Services/Mappers/ApplicationMapper.php',
        'CreateApplicationService' => 'Application/Services/CreateApplicationService.php',
        'GetAllApplicationsService' => 'Application/Services/GetAllApplicationsService.php',
        'GetApplicationByIdService' => 'Application/Services/GetApplicationByIdService.php',
        'UpdateApplicationService' => 'Application/Services/UpdateApplicationService.php',
        'DeleteApplicationService' => 'Application/Services/DeleteApplicationService.php',

        'ApplicationPersistenceDto' => 'Infrastructure/Persistence/Dto/ApplicationPersistenceDto.php',
        'ApplicationEntity' => 'Infrastructure/Persistence/Entities/ApplicationEntity.php',
        'ApplicationPersistenceMapper' => 'Infrastructure/Persistence/Mappers/ApplicationPersistenceMapper.php',
        'ApplicationRepositoryMySQL' => 'Infrastructure/Persistence/Repositories/ApplicationRepositoryMySQL.php',

        'CreateApplicationWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Request/CreateApplicationWebRequest.php',
        'UpdateApplicationWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Request/UpdateApplicationWebRequest.php',
        'ApplicationResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Response/ApplicationResponse.php',
        'ApplicationWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/ApplicationWebMapper.php',
        'ApplicationController' => 'Infrastructure/Entrypoints/Web/Controllers/ApplicationController.php',
    );

    public static function register(): void
    {
        spl_autoload_register(array(self::class, 'loadClass'));
    }

    public static function loadClass(string $className): void
    {
        if (!isset(self::$classMap[$className])) {
            return;
        }

        $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        $filePath = $baseDir . self::$classMap[$className];

        if (!file_exists($filePath)) {
            throw new RuntimeException(
                sprintf('No se encontró el archivo para la clase %s en %s', $className, $filePath)
            );
        }

        require_once $filePath;
    }
}