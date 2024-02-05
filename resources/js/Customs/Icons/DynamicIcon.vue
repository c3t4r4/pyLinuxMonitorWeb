<template>
    <div>
        <AcademicCapIcon  v-if="props.icon === 'AcademicCapIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <ArchiveBoxArrowDownIcon  v-if="props.icon === 'ArchiveBoxArrowDownIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <ArrowLeftOnRectangleIcon v-else-if="props.icon === 'ArrowLeftOnRectangleIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <ArrowDownOnSquareStackIcon v-else-if="props.icon === 'ArrowDownOnSquareStackIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <BellAlertIcon v-else-if="props.icon === 'BellAlertIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <BriefcaseIcon v-else-if="props.icon === 'BriefcaseIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <BuildingLibraryIcon v-else-if="props.icon === 'BuildingLibraryIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <BuildingOffice2Icon v-else-if="props.icon === 'BuildingOffice2Icon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <ChartBarIcon v-else-if="props.icon === 'ChartBarIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <ChatBubbleBottomCenterTextIcon v-else-if="props.icon === 'ChatBubbleBottomCenterTextIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <CogIcon v-else-if="props.icon === 'CogIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <ComputerDesktopIcon v-else-if="props.icon === 'ComputerDesktopIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <CpuChipIcon v-else-if="props.icon === 'CpuChipIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <DevicePhoneMobileIcon v-else-if="props.icon === 'DevicePhoneMobileIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <DocumentMagnifyingGlassIcon v-else-if="props.icon === 'DocumentMagnifyingGlassIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <EnvelopeIcon v-else-if="props.icon === 'EnvelopeIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <GlobeAltIcon v-else-if="props.icon === 'GlobeAltIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <GlobeAsiaAustraliaIcon v-else-if="props.icon === 'GlobeAsiaAustraliaIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <HomeIcon v-else-if="props.icon === 'HomeIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <LinkIcon v-else-if="props.icon === 'LinkIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <MagnifyingGlassIcon v-else-if="props.icon === 'MagnifyingGlassIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <NewspaperIcon v-else-if="props.icon === 'NewspaperIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <PhoneIcon v-else-if="props.icon === 'PhoneIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <PuzzlePieceIcon v-else-if="props.icon === 'PuzzlePieceIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <QrCodeIcon v-else-if="props.icon === 'QrCodeIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <ScaleIcon v-else-if="props.icon === 'ScaleIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <TableCellsIcon v-else-if="props.icon === 'TableCellsIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <TruckIcon v-else-if="props.icon === 'TruckIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <UserCircleIcon v-else-if="props.icon === 'UserCircleIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
        <UsersIcon v-else-if="props.icon === 'UsersIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <VariableIcon v-else-if="props.icon === 'VariableIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>

        <WrenchIcon v-else-if="props.icon === 'WrenchIcon'" class="mr-3 flex-shrink-0 h-4 w-4"/>
    </div>
</template>

<script setup>

    import {
        AcademicCapIcon,
        ArchiveBoxArrowDownIcon,
        ArrowDownOnSquareStackIcon,
        ArrowLeftOnRectangleIcon,
        BellAlertIcon,
        BriefcaseIcon,
        BuildingLibraryIcon,
        BuildingOffice2Icon,
        ChartBarIcon,
        ChatBubbleBottomCenterTextIcon,
        CogIcon,
        ComputerDesktopIcon,
        CpuChipIcon,
        DevicePhoneMobileIcon,
        DocumentMagnifyingGlassIcon,
        EnvelopeIcon,
        GlobeAltIcon,
        GlobeAsiaAustraliaIcon,
        HomeIcon,
        LinkIcon,
        MagnifyingGlassIcon,
        NewspaperIcon,
        PhoneIcon,
        PuzzlePieceIcon,
        QrCodeIcon,
        ScaleIcon,
        TableCellsIcon,
        TruckIcon,
        UserCircleIcon,
        UsersIcon,
        VariableIcon,
        WrenchIcon
    } from '@heroicons/vue/24/solid';

    const props = defineProps({
        icon: {
            type: String,
            default: ""
        }
    });
</script>
